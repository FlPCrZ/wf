<?php
$displayCat = '';
$displayStat = '';
$errorTitle = '';
$errorDescription = '';
$errorStatus = '';

foreach($categories as $cat) {
    $displayCat .=  '<input type="checkbox" name="'.$cat['label'].'" value="'.$cat['label'].'">'.$cat['label'].'<br/>';
}

$status = getStatusAll();

foreach($status as $stat) {
    $displayStat .=  '<option name="'.$stat['label'].'" value="'.$stat['label'].'">'.$stat['label'].'<br/>';
}

if (isset($success) && $success) {
    $success = '<div class="alert alert-success">You successfuly created a Project!</div>';
} else {
    $success = '';
}

if (!empty($errors['title'])) {
    $errorTitle = '<div class="alert alert-warning">You need a title</div>';
}

if (!empty($errors['description'])) {
    $errorDescription = '<div class="alert alert-warning">You need a description</div>';
}

if (!empty($errors['status'])) {
    $errorStatus = '<div class="alert alert-warning">You need a status</div>';
}

$content = <<<EOT
$success
<form method="POST" enctype="multipart/form-data">
<!--Title-->
    <div class="form-group">
        <label for="title">Project Title</label>
        <input type="text" class="form-control" placeholder="Enter your Project Name here please..." name="title">
    $errorTitle
    </div>
<!--Description-->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" placeholder="Enter your Project Description here please..." name="description"></textarea>
    $errorDescription
    </div>
<!--Image-->
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>
<!--PublishingDate-->
    <div class="form-group">
        <label for="pubDate">Publishing Date</label>
        <input type="date" class="form-control" placeholder="Enter your Project Publishing Date here please..." name="pubDate">
    </div>
<!--StatusId-->
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control form-select" name="status">
        <option>--</option>
            $displayStat
        </select>
    $errorStatus
    </div>
<!--Category-->
    <div class="form-group">
    <label for="category">Category</label><br/>
        $displayCat
    </div>


    <button type="submit" class="btn btn-primary" id="submitRegister" name="submitRegister">Submit</button>
</form>
EOT;
    
$title = 'Tag be sill Create Project';


include __DIR__ . '/../view/Base.html.php';

