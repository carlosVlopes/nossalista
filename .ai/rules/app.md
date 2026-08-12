---
paths:
  - 'app/**'
---

# App

## Gift registry: products + reservations design
Public gift list is DB-driven. `products` (categoria, nome, descricao, imagem, link, status, ordem) with `status` cast to App\Enums\ProductStatus (Disponivel/Reservado/Oculto). `Product::visivel()` hides Oculto on the public site; count uses Disponivel.
Reservations live in a separate `reservations` table (product_id, nome, telefone) to keep history. Reserving is done in ReservationController@store inside a DB transaction with lockForUpdate() to prevent double-booking; it sets product status to Reservado. Only admin cancels a reservation (frees product back to Disponivel).
Admin is custom Blade under /admin, protected by native `auth` middleware. Guests are redirected to route `admin.login` (configured in bootstrap/app.php via redirectGuestsTo). Admin user is seeded from ADMIN_EMAIL/ADMIN_PASSWORD env vars. Uploaded images go to the `public` disk (storage:link required).
