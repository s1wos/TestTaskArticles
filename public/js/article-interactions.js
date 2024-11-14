document.addEventListener("DOMContentLoaded", () => {
    const articleElement = document.querySelector('[data-article-slug]');

    const articleSlug = articleElement.getAttribute('data-article-slug');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Инкрементация просмотров через 5 секунд
    setTimeout(() => {
        fetch(`/articles/${articleSlug}/view`, {
            method: "POST",
            headers: { 'X-CSRF-TOKEN': csrfToken }
        })
            .then(res => res.json())
            .then(data => document.getElementById("views-count").textContent = data.views)
            .catch(console.error);
    }, 5000);

    // Инкрементация лайков по клику
    document.getElementById("like-button").addEventListener("click", () => {
        fetch(`/articles/${articleSlug}/like`, {
            method: "POST",
            headers: { 'X-CSRF-TOKEN': csrfToken }
        })
            .then(res => res.json())
            .then(data => document.getElementById("likes-count").textContent = data.likes)
            .catch(console.error);
    });
});
