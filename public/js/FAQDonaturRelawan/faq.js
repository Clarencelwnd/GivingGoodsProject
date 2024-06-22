const faqQuestions = document.querySelectorAll('.faq-question-content');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const parent = question.parentElement;
            parent.classList.toggle('active');
        });
    });
