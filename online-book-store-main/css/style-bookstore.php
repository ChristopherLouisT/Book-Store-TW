<link href="css/Bookstore.css" rel="stylesheet" type = "text/css">

<style>
/* Card img size */
.card-img-top {
    height: 400px;
    object-fit: fill;
    border-radius: 5px;
}

/* Dark mode */
body.dark-mode {
    background-color: #121212;
    color: #ffffff;
}

.navbar.dark-mode {
    background-color: #333333 !important;
}

.card.dark-mode {
    background-color: #1e1e1e;
    color: #ffffff;
    border-color: #444444;
}

.list-group-item.dark-mode {
    background-color: #1e1e1e;
    color: #ffffff;
}

.book-popup.dark-mode {
    background: rgba(0, 0, 0, 0.8);
}

.btn-outline-light.dark-mode {
    border-color: #ffffff;
    color: #ffffff;
}


/* Popup Styles index-type-category-author-search */
.book-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1000;
    justify-content: center;
    align-items: center;
    color: white;
}

.popup-content {
    background: #222;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    max-width: 600px;
    width: 90%;
}

.book-card:hover {
    cursor: pointer;
}
</style>
