<?php
require_once 'elements/header.php';
require_once 'class/Message.php';
require_once 'class/GuestBook.php';

$errors = $success = $msg = $username = null;
$file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'message';
$guestBook = new GuestBook($file);

if (!empty($_POST['message']) && !empty($_POST['username'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestBook->addMessage($message);
        $success = "Message successfully added";
    } else {
        $errors = $message->getErrors();
        $username = htmlentities($_POST['username']);
        $msg = htmlentities($_POST['message']);
    }
}
?>

<div class="container">

    <form action="" method="post">
        <h2>Golden book</h2>
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <p><?= $success ?></p>
            </div>
        <?php endif; ?>
        <?php if (isset($errors)): ?>
            <div class="alert alert-danger">
                <p>Invalid form</p>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <input type="text" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" placeholder="Enter your name here ..." value="<?= $username ?>" >
            <?php if(isset($errors['message'])): ?>
                <div class="invalid-feedback"><?= $errors['username'] ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <textarea name="message" id="" cols="30" rows="10" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" placeholder="Enter your message here ..." ><?= $msg ?></textarea>
            <?php if(isset($errors['message'])): ?>
                <div class="invalid-feedback"><?= $errors['message'] ?></div>
            <?php endif; ?>
        </div>
        <button class="btn btn-primary" type="submit">Add</button>
    </form>

    <section class="mt-5 mb-5">
        <?php if ($guestBook): ?>
            <?php foreach($guestBook->getMessages() as $m): ?>
                <?= $m->toHtml(); ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

</div>

<?php require_once 'elements/footer.php'; ?>