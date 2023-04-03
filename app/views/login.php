<main class="d-flex p-5">
    <div class="text-part w-50">
        <img src="images/login.jpg" class="w-100">
    </div>

    <div class="form-part w-50">
        <div class="mt-3 mb-5">
            <h3 class="text-dark">Welcome Back :)</h3>
            <p class="text-black-50">To keep connected with us please login with your personal information by email address and password.</p>
        </div>
        <form class="w-75" action="/login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="somebody@example.com" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Must be at least 8 chars">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 lead">Login</button>
        </form>
    </div>
</main>