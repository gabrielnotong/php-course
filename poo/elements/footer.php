<footer>
    <hr>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <?php if ('/newsletter.php' !== $_SERVER['SCRIPT_NAME']): ?>
                <form action="/newsletter.php" method="post" class="form-inline">
                    <div class="form-group">
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="Enter your email" 
                            class="form-control" 
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            <?php endif; ?>
        </div>
        <div class="col-4">
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
</body>

</html>