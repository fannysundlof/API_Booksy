# Inlämningsuppgift PHP 
## E-commerce API Booksy

## Uppgiftsbeskrivning
Skapa ett API för en e-handelsplattform. 

Användarhantering : Registrera användare, Logga in användare, Hantera aktiva sessioner i from av tokens
Produkthantering : Lägga till produkter, Ta bort produkter, Uppdatera produkter, Lista produkter, Sortera produkter
Varukorg :Lägga till produkter i varukorg ta bort produkter från varukorg, Checka ut varukorgen

## Booksy API funktion

I Booksys API kan du som Admin se alla produkter genom att ange din (giltiga)token som du fick vid inloggning. I viewProducts kan du lägga till en ny produkt, ändra befintliga produkter eller ta bort dem helt. 

Som kund hos Booksy kan du se alla produkter genom att ange din (giltiga)token som du fick vid inloggning och i viewProducts kan du lägga till de produkter du vill köpa i din varukorg. Från startsidan kan du sedan se din varukorg genom att ange din (giltiga)token. I viewCart kan du ändra i din varukorg och göra ett köp genom att trycka på Checkout. Då skapas din order i databasen och alla dina produkter i varukorgen försvinner.

Både Admin och Kund loggas ut automatiskt efter 60 minuter och en kunds varukorg är endast giltig under denna tid.

Inlogg 
Username: admin
Password: admin

Username: kund
Password: kund

## Planering (24/3-2020)
End-points
    v1
    
    - products/
        -view - Se alla produkter
        -select - Se vald produkt
        -sort - sortera produkter
        -delete - ta bort vald produkt
        -add (new product) - Lägg till en produkt
        -edit - Redigera en befintlig produkt

    - users/
        -registrer - Registerar en användare
        -login - Logga in som redan registrerad användare + få en token.

    - cart/ -- endast med giltig token
        -add (product to cart)
        -Se aktuell kundvagn
        -remove (product to cart)
        -checkout


## Databasen 

    Tabeller

    Products 
        - ID 
        - Title
        - Price
        - Descript
        - Quatity 
    Users 
        - ID
        - Username
        - Password

    Tokens 
        - ID 
        - User_id
        - Date_updated
        - Token
    Cart 
        - ID
        - Token_id
        - Product_id
    Orders
        -ID
        -Product_id
        -User_id
        -Date
        


## KODSTANDARD/Naming conventions

Class name: Singular och PascalCase.
Methods and functions: camelCase.
Class handlers: snake_case och slutar med _handler exempel: $order_handler = new Order.




