<?php
require'./utils/connexion.php';
require_once'./utils/fonction.php';
include_once('includes/head.php');



$db = new Database();


$page=[
    "title" => "Track Calorie - Accueil"
];

include_once('includes/header.php');

?>

<style>

table {
    margin-top : 50px;
    width: 100%;
    border-collapse: collapse;
}

th {
    background-color: #4285f4; /* Google blue color */
    color: black;
    text-align: left;
    padding: 8px;
}

td {
    border-bottom: 1px solid #ddd;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.btn {
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #fff;
}

.btn-warning {
    background-color: #ffc107; /* Warning button color */
}

.btn-danger {
    background-color: #dc3545; /* Danger button color */
}



</style>
<table class="table table-striped google-table">
    <thead>
        <tr>
            <th class="google-th">Email</th>
            <th class="google-th">prenom</th>
            <th class="google-th">age</th>
            <th class="google-th">sexe</th>
            <th class="google-th">poids</th>
            <th class="google-th">taille</th>
            <th class="google-th">password</th>
            <th class="google-th">isAdmin</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $stmt = $db->prepare("SELECT * FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll();
            foreach ($users as $user) { ?>
                <tr class="google-tr">
                    <td class="google-td"><?php echo $user['email']; ?></td>
                    <td class="google-td"><?php echo $user['prenom']; ?></td>
                    <td class="google-td"><?php echo $user['age']; ?></td>
                    <td class="google-td"><?php echo $user['sexe']; ?></td>
                    <td class="google-td"><?php echo $user['poids']; ?></td>
                    <td class="google-td"><?php echo $user['taille']; ?></td>
                    <td class="google-td"><?php echo $user['password']; ?></td>
                    <td class="google-td"><?php echo $user['isAdmin']; ?></td>
                    <td class="google-td">
                        <a href="update_user.php?id=<?php echo $user['email']; ?>" class="btn btn-warning google-btn">Update</a>
                        <a href="delete_user.php?id=<?php echo $user['email']; ?>" class="btn btn-danger google-btn">Delete</a>
                    </td>
                </tr>
        <?php } ?>
    </tbody>
</table>
