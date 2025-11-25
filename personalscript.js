document.addEventListener('DOMContentLoaded', () => {
    const currentReadForm = document.getElementById('currentReadForm');
    const currentReadInput = document.getElementById('currentReadInput');
    const currentReadSection = document.getElementById('currentReadSection');
    const finishBookBtn = document.getElementById('finishBookBtn');
    const completedBooksList = document.getElementById('completedBooksList');

    const readingGoalForm = document.getElementById('readingGoalForm');
    const readingGoalInput = document.getElementById('readingGoalInput');
    const progressFill = document.querySelector('.progressFill');
    const progressText = document.getElementById('progressText');

    const username = document.querySelector('.personalContainer').dataset.username;

    let goal = 0;
    let completedCount = 0;

    async function loadCompletedBooks() {
        try {
            const res = await fetch('load_completed_books.php?username=' + username);
            const books = await res.json();

            completedBooksList.innerHTML = "";

            books.forEach(book => {
                const li = document.createElement('li');
                li.textContent = book.book_title;
                completedBooksList.appendChild(li);
            });

        } catch (error) {
            console.error("Error loading completed books:", error);
        }
    }
    loadCompletedBooks();


    async function loadProgress() {
        try {
            const res = await fetch('load_progress.php?username=' + username);
            const data = await res.json();

            goal = data.goal ?? 0;
            completedCount = data.completed ?? 0;

            updateProgressBar();

        } catch (error) {
            console.error("Error loading progress:", error);
        }
    }
    loadProgress();


    function updateProgressBar() {
        let percent = goal > 0 ? (completedCount / goal) * 100 : 0;
        progressFill.style.width = percent + '%';
        progressText.textContent = `${completedCount} / ${goal} Completed`;
    }


    readingGoalForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        goal = parseInt(readingGoalInput.value);
        if (isNaN(goal) || goal < 1) return;

        await fetch('save_goal.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, goal })
        });

        updateProgressBar();
    });


    currentReadForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const bookTitle = currentReadInput.value.trim();
        if (!bookTitle) return;

        currentReadSection.textContent = bookTitle;

        await fetch('update_current_book.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, book_title: bookTitle })
        });

        currentReadInput.value = '';
    });



    finishBookBtn.addEventListener('click', async () => {
        const bookTitle = currentReadSection.textContent.trim();
        if (!bookTitle || bookTitle === 'Title of Book') return;

        const li = document.createElement('li');
        li.textContent = bookTitle;
        completedBooksList.appendChild(li);

        await fetch('finish_book.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, book_title: bookTitle })
        });

        completedCount++;
        updateProgressBar();

        currentReadSection.textContent = 'Title of Book';
    });

});
