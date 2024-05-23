import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.addEventListener("load", (e) => {
    let getData;
    let doneTypingTimer = 100;
    let bookSearch = document.getElementById("book_search");

    if(bookSearch !== null) {
        bookSearch.onkeyup = (e) => {
            clearTimeout(getData);
            getData = setTimeout(searchBooks, doneTypingTimer);
        };
    
        bookSearch.onkeydown = (e) => {
            clearTimeout(getData);
        };
    }

    async function searchBooks() {
        let query = "https://openlibrary.org/search.json?q=" + bookSearch.value;
        document.getElementById(
            "bookResults"
        ).innerHTML = `<option value="" disabled selected>Select your option</option>`;

        await fetch(query)
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                response.docs.forEach((book) => {
                    let el = document.createElement("option");
                    let title = book.title;
                    let key = book.key;
                    key = key.split("/");
                    console.log(key)

                    if (title.length > 30) {
                        title = title.substring(0, 30);
                    }

                    el.innerHTML = title + " - " + book.author_name[0];
                    el.value = key[2];
                    el.classList.add("w-4");
                    document.getElementById("bookResults").appendChild(el);
                });
            });
    }
});
