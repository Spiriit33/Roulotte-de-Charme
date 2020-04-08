<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Accueil', route('home'));
});
Breadcrumbs::for('roulotte', function ($trail) {
    $trail->parent('home');
    $trail->push('La Roulotte
    ', route('contact'));
});
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});
Breadcrumbs::for('administration', function ($trail) {
    $trail->parent('home');
    $trail->push('Administration', route('administration'));
});
Breadcrumbs::for('location', function ($trail) {
    $trail->parent('home');
    $trail->push('Situer la roulotte', route('administration'));
});
Breadcrumbs::for('tarifs-reservations', function ($trail) {
    $trail->parent('home');
    $trail->push('Tarifs & Réservations', route('tarifs_reservations'));
});
Breadcrumbs::for('activités', function ($trail) {
    $trail->parent('home');
    $trail->push('Activités', route('tarifs_reservations'));
});
Breadcrumbs::for('manage_contacts', function ($trail) {
    $trail->parent('administration');
    $trail->push('Gérer les contacts',route('manage_contacts'));
});
Breadcrumbs::for('show_contacts', function ($trail,$contact) {
    $trail->parent('manage_contacts');
    $trail->push($contact->objet,route('show_contacts',['id'=>$contact->id]));
});
Breadcrumbs::for('manage_news', function ($trail) {
    $trail->parent('administration');
    $trail->push('Gérer les actualités',route('manage_news'));
});
Breadcrumbs::for('manage_activites', function ($trail) {
    $trail->parent('administration');
    $trail->push('Gestion des activites',route('manage_activités'));
});
Breadcrumbs::for('update_activites', function ($trail) {
    $trail->parent('administration');
    $trail->push('Gestion des activites',route('manage_activités'));
    $trail->push('Edit');
});
Breadcrumbs::for('manage_bookings', function ($trail) {
    $trail->parent('administration');
    $trail->push('Gestion des reservations',route('manage_reservations'));
});
Breadcrumbs::for('show_bookings', function ($trail,$reservation) {
    $trail->parent('manage_bookings');
    $trail->push('#'.$reservation->id,route('show_reservation',['id'=>$reservation->id]));
});
Breadcrumbs::for('manage_roulotte', function ($trail) {
    $trail->parent('administration');
    $trail->push('Gestion de la roulotte',route('manage_roulotte'));
});
Breadcrumbs::for('update_roulotte', function ($trail) {
    $trail->parent('manage_roulotte');
    $trail->push('Modifier');
});
Breadcrumbs::for('manage_site_touristique', function ($trail) {
    $trail->parent('administration');
    $trail->push('Gestion des sites touristiques',route('manage_site'));
});
Breadcrumbs::for('update_sites_touristiques', function ($trail) {
    $trail->parent('manage_site_touristique');
    $trail->push('Modifier');
});
