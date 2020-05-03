<form>
  <div class="col-sm-12">
      <h4><small>Register to start buying cars immediately</small></h4>
      <hr>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="confirmpassword">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Additional details of address</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, floor etc..." name="additionaladdress">
  </div>
  <div class="form-group col-md-6">
   <label>Birth Date</label>
   <input type="date" name="bday" max="3000-12-31" 
          min="1000-01-01" class="form-control" name="birthdate">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Bács-Kiskun</option>
        <option>Baranya</option>
        <option>Békés</option>
        <option>Borsod-Abaúj-Zemplén</option>
        <option>Csongrád</option>
        <option>Fejér</option>
        <option>Győr-Moson-Sopron</option>
        <option>Hajdú-Bihar</option>
        <option>Heves</option>
        <option>Jász-Nagykun-Szolnok</option>
        <option>Komárom-Esztergom</option>
        <option>Nógrád</option>
        <option>Pest</option>
        <option>Somogy</option>
        <option>Szabolcs-Szatmár-Bereg</option>
        <option>Tolna</option>
        <option>Vas</option>
        <option>Veszprém</option>
        <option>Zala</option>
      </select>
    </div>
    <div class="form-group col-md-1">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip">
    </div>
  </div>
  <div class="form-group col-md-2">
    <br><br><hr>
    <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
  </div>
</form>