<?php
$note_id=$_GET['note_id'];
    echo $note_id;
require_once 'partials/init.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note_id=$_GET['note_id'];
    echo $note_id;
    $query = $con->prepare("DELETE FROM notes WHERE note_id=?");
    $query->execute(array($note_id));
    header('Location:clients.php');
    ?>
    DONE
    <?php
}
else
{
?>
<form method="post" onsubmit="alert('Deleted');" action="delete.php">
    <label>
        Are you sure you want to delete?
    </label>
    <button type="submit" id="yesButton">
        Yes
    </button>
    <button id="noButton" onClick="alert('Not deleted')">
        No
    </button>
</form>
<?php }
?>