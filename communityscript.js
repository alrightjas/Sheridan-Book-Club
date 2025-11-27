let selectedRating = 0;

const stars = document.querySelectorAll('.star');

if (stars.length > 0) {
    stars.forEach(star => {
        star.addEventListener('click', () => {
            selectedRating = parseInt(star.dataset.value);

            // Clear all highlighted stars
            stars.forEach(s => s.classList.remove('selected'));

            // Highlight stars up to the clicked one
            for (let i = 0; i < selectedRating; i++) {
                stars[i].classList.add('selected');
            }
        });
    });
}

async function loadReviews() {
    const response = await fetch('get_reviews.php');
    const reviews = await response.json();

    const container = document.getElementById('reviews-container');
    container.innerHTML = '';

    if (reviews.length === 0) {
        container.innerHTML = '<p>No reviews yet. Be the first to write one!</p>';
        return;
    }

    reviews.forEach(r => {
        const box = document.createElement('div');
        box.classList.add('review-box'); 

        box.innerHTML = `
        <div class="review-header">
            <strong>${r.username}</strong>
            <span class="review-rating">${'★'.repeat(r.rating)}</span>
        </div>

        <p>${r.review_text}</p>
        <small>${r.created_at}</small>
        `;

        container.appendChild(box);
    });
}

loadReviews();

const textarea = document.getElementById('review-text');
const countSpan = document.getElementById('current-count');
const submitBtn = document.getElementById('submit-review');

if (textarea && countSpan && submitBtn) {
    textarea.addEventListener('input', () => {
        countSpan.textContent = textarea.value.length;
    });

    submitBtn.addEventListener('click', async () => {
        const reviewText = textarea.value.trim();

        if (!selectedRating) {
            alert('Please select a rating before submitting your review.');
            return;
        }

        const response = await fetch('submit_reviews.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ review: reviewText, rating: selectedRating })
        });

        const result = await response.text();
        alert(result);

     
        textarea.value = '';
        selectedRating = 0;
        stars.forEach(s => s.classList.remove('selected'));

        textarea.value = '';
        countSpan.textContent = '0';
        selectedRating = 0;
        stars.forEach(s => s.classList.remove('selected'));

        loadReviews();
    });
}
