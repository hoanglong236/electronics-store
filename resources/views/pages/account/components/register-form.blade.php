<form action="{{ route('customer.register.handler') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Name(*)</label>
        <input id="name" class="form-control" name="name" value="{{ old('name') }}" type="text"
            placeholder="Name" required>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="phone" class="form-label">Phone(*)</label>
                <input id="phone" class="form-control" name="phone" value="{{ old('phone') }}" type="text"
                    placeholder="Phone" maxlength="15" required>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="gender" class="form-label">Gender(*)</label>
                <select id="gender" class="form-control" name="gender">
                    <option value="true">Male</option>
                    <option value="false" @selected(!old('gender'))>Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email(*)</label>
        <input id="email" class="form-control" name="email" value="{{ old('email') }}" type="email"
            placeholder="Email" required>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password" class="form-label">Password(*)</label>
                <input id="password" class="form-control" name="password" type="password" placeholder="Password"
                    required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="confirmPassword" class="form-label">Confirm password(*)</label>
                <input id="confirmPassword" class="form-control" name="confirmPassword" type="password"
                    placeholder="Confirm password" required>
            </div>
        </div>
    </div>

    <button type="submit" class="btn action-btn register-btn mt-3">Register</button>
</form>
