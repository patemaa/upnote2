import './bootstrap';
import Alpine from 'alpinejs';
import Sortable from 'sortablejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    // Kategorileri sıralanabilir yap
    var categoriesList = document.getElementById('categories-list');
    if (categoriesList) {
        new Sortable(categoriesList, {
            animation: 150, // Sıralama animasyonu
            onEnd: function (evt) {
                // Sıralama bittiğinde çalışacak fonksiyon
                // Burada yeni sıralamayı veritabanına göndereceğiz
                console.log('Kategori sıralaması değişti:', evt.oldIndex, '->', evt.newIndex);
                updateOrder('categories', this.toArray()); // toArray() sıralanmış ID'leri verir
            },
        });
    }

    // Notları sıralanabilir yap
    var notesList = document.getElementById('notes-list');
    if (notesList) {
        new Sortable(notesList, {
            animation: 150,
            onEnd: function (evt) {
                console.log('Not sıralaması değişti:', evt.oldIndex, '->', evt.newIndex);
                updateOrder('notes', this.toArray());
            },
        });
    }
});

// Sıralamayı sunucuya gönderecek yardımcı fonksiyon (Laravel için)
function updateOrder(type, order) {
    fetch(`/api/${type}/update-order`, { // Laravel rotanız burası olacak
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF koruması
        },
        body: JSON.stringify({ order: order })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(`${type} sıralaması başarıyla güncellendi.`);
            } else {
                console.error(`Error updating ${type} order:`, data.message);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
}
