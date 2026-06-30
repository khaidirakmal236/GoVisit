<style>
.ac-wrap { position: relative; }

.ac-dropdown {
    position: absolute; top: calc(100% + 6px); left: 0; right: 0;
    background: white; border-radius: 16px;
    box-shadow: 0 8px 40px rgba(0,0,0,0.15);
    border: 1px solid #E5E7EB;
    z-index: 999; overflow: hidden;
    display: none;
    animation: acSlide 0.15s ease;
}
@keyframes acSlide {
    from { opacity:0; transform:translateY(-6px); }
    to   { opacity:1; transform:translateY(0); }
}
.ac-dropdown.show { display: block; }

.ac-item {
    display: flex; align-items: center; gap: 12px;
    padding: 10px 14px; cursor: pointer;
    transition: background 0.15s; text-decoration: none; color: inherit;
    border-bottom: 1px solid #F9FAFB;
}
.ac-item:last-child { border-bottom: none; }
.ac-item:hover, .ac-item.active { background: #F0FDF4; }

.ac-thumb {
    width: 44px; height: 44px; border-radius: 10px; flex-shrink: 0;
    object-fit: cover; background: #E5E7EB;
    display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
    overflow: hidden;
}
.ac-thumb img { width: 100%; height: 100%; object-fit: cover; }

.ac-info { flex: 1; min-width: 0; }
.ac-name { font-size: 14px; font-weight: 700; color: #1A1A2E; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.ac-name mark { background: none; color: #1D9E75; font-weight: 800; }
.ac-loc  { font-size: 12px; color: #9CA3AF; margin-top: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

.ac-badge {
    font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 999px; flex-shrink: 0;
}
.ac-badge-wisata { background: #EAF3DE; color: #3B6D11; }
.ac-badge-cafe   { background: #FAEEDA; color: #633806; }
.ac-badge-gem    { background: #EEEDFE; color: #3C3489; }

.ac-footer {
    padding: 10px 14px; font-size: 12px; color: #9CA3AF;
    border-top: 1px solid #F3F4F6; text-align: center;
    cursor: pointer; transition: color 0.15s;
}
.ac-footer:hover { color: #1D9E75; }

.ac-empty {
    padding: 20px 14px; text-align: center;
    font-size: 13px; color: #9CA3AF;
}
</style>

<script>
(function() {
    const BASE = '<?= base_url('api/suggest') ?>';

    function initAutocomplete(inputEl, formEl) {
        if (!inputEl) return;

        // Pasang dropdown ke body agar tidak terpotong overflow parent
        const dropdown = document.createElement('div');
        dropdown.className = 'ac-dropdown';
        document.body.appendChild(dropdown);

        function positionDropdown() {
            const rect = inputEl.getBoundingClientRect();
            dropdown.style.position = 'fixed';
            dropdown.style.top      = (rect.bottom + 6) + 'px';
            dropdown.style.left     = rect.left + 'px';
            dropdown.style.width    = rect.width + 'px';
        }

        let timer, activeIdx = -1, lastResults = [];

        function thumbHTML(item) {
            const colors = { wisata:'#C0DD97', cafe:'#FAC775', hidden_gem:'#CECBF6' };
            const emoji  = { wisata:'🏔️', cafe:'☕', hidden_gem:'💎' };
            if (item.foto_utama) {
                return `<div class="ac-thumb"><img src="<?= base_url() ?>uploads/tempat/${item.foto_utama}" loading="lazy"></div>`;
            }
            return `<div class="ac-thumb" style="background:${colors[item.kategori]||'#E5E7EB'}">${emoji[item.kategori]||'📍'}</div>`;
        }

        function badgeClass(k) {
            return k === 'hidden_gem' ? 'ac-badge-gem' : 'ac-badge-' + k;
        }
        function badgeLabel(k) {
            return k === 'hidden_gem' ? 'Hidden Gem' : k.charAt(0).toUpperCase() + k.slice(1);
        }

        function highlight(text, q) {
            if (!q) return text;
            const re = new RegExp('(' + q.replace(/[.*+?^${}()|[\]\\]/g,'\\$&') + ')', 'gi');
            return text.replace(re, '<mark>$1</mark>');
        }

        function render(results, q) {
            positionDropdown();
            lastResults = results;
            activeIdx   = -1;

            if (!results.length) {
                dropdown.innerHTML = `<div class="ac-empty">Tidak ada hasil untuk "<strong>${q}</strong>"</div>`;
                dropdown.classList.add('show');
                return;
            }

            const title = q
                ? `<div style="padding:8px 14px 4px;font-size:11px;font-weight:700;color:#9CA3AF;text-transform:uppercase;letter-spacing:0.8px;">Hasil pencarian</div>`
                : `<div style="padding:8px 14px 4px;font-size:11px;font-weight:700;color:#9CA3AF;text-transform:uppercase;letter-spacing:0.8px;">✨ Semua Tempat</div>`;

            const items = title + results.map((item, i) => `
                <a class="ac-item" href="<?= base_url() ?>tempat/${item.id}" data-idx="${i}">
                    ${thumbHTML(item)}
                    <div class="ac-info">
                        <div class="ac-name">${highlight(item.nama_tempat, q)}</div>
                        <div class="ac-loc">📍 ${item.alamat}</div>
                    </div>
                    <span class="ac-badge ${badgeClass(item.kategori)}">${badgeLabel(item.kategori)}</span>
                </a>
            `).join('');

            const footer = `<div class="ac-footer" id="acFooter">Tekan Enter untuk lihat semua hasil →</div>`;
            dropdown.innerHTML = items + footer;
            dropdown.classList.add('show');

            document.getElementById('acFooter').addEventListener('click', () => formEl && formEl.submit());
        }

        function close() {
            dropdown.classList.remove('show');
            activeIdx = -1;
        }

        function setActive(idx) {
            const items = dropdown.querySelectorAll('.ac-item');
            items.forEach(el => el.classList.remove('active'));
            if (idx >= 0 && idx < items.length) {
                items[idx].classList.add('active');
                inputEl.value = lastResults[idx].nama_tempat;
            }
            activeIdx = idx;
        }

        async function fetchAndRender(q) {
            try {
                const res  = await fetch(`${BASE}?q=${encodeURIComponent(q)}`);
                const data = await res.json();
                render(data, q);
            } catch(e) { close(); }
        }

        inputEl.addEventListener('input', function() {
            const q = this.value.trim();
            clearTimeout(timer);
            timer = setTimeout(() => fetchAndRender(q), 200);
        });

        inputEl.addEventListener('focus', function() {
            fetchAndRender(this.value.trim());
        });

        inputEl.addEventListener('keydown', function(e) {
            const items = dropdown.querySelectorAll('.ac-item');
            if (!dropdown.classList.contains('show')) return;

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                setActive(Math.min(activeIdx + 1, items.length - 1));
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                setActive(Math.max(activeIdx - 1, -1));
                if (activeIdx === -1) inputEl.value = e.target.dataset.original || inputEl.value;
            } else if (e.key === 'Escape') {
                close();
            } else if (e.key === 'Enter' && activeIdx >= 0) {
                e.preventDefault();
                window.location.href = items[activeIdx].href;
            }
        });


        document.addEventListener('click', function(e) {
            if (!inputEl.contains(e.target) && !dropdown.contains(e.target)) close();
        });

        window.addEventListener('scroll', () => { if (dropdown.classList.contains('show')) positionDropdown(); }, true);
        window.addEventListener('resize', () => { if (dropdown.classList.contains('show')) positionDropdown(); });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Beranda hero search
        const heroInput = document.getElementById('heroSearchInput');
        const heroForm  = document.getElementById('heroSearchForm');
        if (heroInput) initAutocomplete(heroInput, heroForm);

        // Eksplorasi search
        const expInput = document.getElementById('expSearchInput');
        const expForm  = document.getElementById('expSearchForm');
        if (expInput) initAutocomplete(expInput, expForm);
    });
})();
</script>
