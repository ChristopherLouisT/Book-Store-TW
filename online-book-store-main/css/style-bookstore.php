<link href="css/Bookstore.css" rel="stylesheet" type = "text/css">

<style>
.card-img-top {
    height: 350px;
    object-fit: cover;
    border-radius: 5px;
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
