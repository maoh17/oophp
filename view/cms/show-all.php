<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

//<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"


if (!$resultset) {
    return;
}

?>


<h2><?= $title ?></h2>

<table style="font-size: 12px">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"

    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Path</th>
        <th>Slug</th>
        <th>Type</th>
        <th>Published</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Deleted</th>
        <th></th>
        <th></th>
    </tr>
<?php $id = -1; foreach ($resultset as $row) :
    $id++;
?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>

        <?php if ($row->type == "page") {?>
            <td><a href="edit-page?id=<?= $row->id ?>"><i class="far fa-edit"></i></a></td>
        <?php } ?>
        <?php if ($row->type == "post") {?>
            <td><a href="edit-post?id=<?= $row->id ?>"><i class="far fa-edit"></i></a></td>
        <?php } ?>
        <td><a href="delete?id=<?= $row->id ?>"><i class="far fa-trash-alt"></i></a></td>
    </tr>
<?php endforeach; ?>
</table>
