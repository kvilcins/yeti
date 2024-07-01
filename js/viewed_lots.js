document.addEventListener('DOMContentLoaded', function () {
    const lotIdMetaTag = document.querySelector('meta[name="lot-id"]');
    if (lotIdMetaTag) {
        const lotId = parseInt(lotIdMetaTag.getAttribute('content'));
        
        if (!isNaN(lotId)) {
            addViewedLot(lotId);
        }
    }
});

function addViewedLot(lotId) {
    let viewedLots = JSON.parse(localStorage.getItem('viewed_lots')) || [];
    
    if (!viewedLots.includes(lotId)) {
        viewedLots.push(lotId);
        localStorage.setItem('viewed_lots', JSON.stringify(viewedLots));
    }
}
