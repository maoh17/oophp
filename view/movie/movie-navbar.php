<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

/* exempel
<navbar class="navbar">
    <a href="movie/show-all">Visa alla filmer</a> |
    <a href="movie/reset">Reset database</a> |
    <a href="movie/search-title">Sök titel</a> |
    <a href="movie/search-year">Search year</a> |
    <a href="movie/movie-select">Select</a> |
    <a href="movie/movie-edit">Edit</a> |
    <a href="movie/show-all-sort">Show all sortable</a> |
    <a href="movie/show-all-paginate">Show all paginate</a> |
</navbar>
*/

?>
<br>

<navbar class="navbar">
    <a href="show-all">Visa alla filmer</a> |
    <a href="search-title">Sök titel</a> |
    <a href="search-year">Sök år</a> |
    <a href="crud-movie">CRUD</a> |
</navbar>

<br>
<br>
