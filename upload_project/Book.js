export class Book {
   
      constructor(title, author, description, pages, currentPage, read = false) {
        this.title = title;
        this.author = author;
        this.description = description;
        this.pages = pages;
        this.currentPage = currentPage;
        this.read = read;


      }
       
      readBook(page) {
        if(page < 1 || page > this.pages) {
          return 0;
        } else if(page >= 1 && page < this.pages) {
          this.currentPage = page;
          return 1;
        } else if(page === this.pages) {
          this.currentPage = page;
          this.read = true;
          return 1;
        }
      }
       
       
    }
     
    let premierLivre = new Book("Le Début", "Kévin", "C'est le début", 1990, 30);
    let deuxiemeLivre = new Book("Le Milieu", "Adrien", "C'est le milieu", 1996, 1996);
    let troisiemeLivre = new Book("La fin", "Evann", "C'est la fin", 2003, 0);
       
    export const books = [premierLivre, deuxiemeLivre, troisiemeLivre];