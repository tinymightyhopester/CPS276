<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <div class = "container">
        <h1>Form Project</h1><br>
        <form method = "post" action="#">

        <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
        </div><br/>

        <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Address" aria-label="Address">
        </div>
        </div><br/>

        <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="City" aria-label="City">
        </div>
        <div class="col">
            <select class="form-select" aria-label="State">
            <option value="OH" aria-label="Ohio">Ohio</option>
            <option value="PA" aria-label="Pennsylvania">Pennsylvania</option>
            <option selected value="MI" aria-label="Michigan">Michigan</option>
            <option value="MO" aria-label="Missouri">Missouri</option>
            <option value="AL" aria-label="Alabama">Alabama</option>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Zipcode" aria-label="Zipcode">
        </div>
        </div><br/>

        <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Male" value="male">
            <label class="form-check-label" for="Male">Male</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Female" value="female">
            <label class="form-check-label" for="Female">Female</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Other" value="other">
            <label class="form-check-label" for="Other">Other</label>
            </div>
        </div>
        </div><br/>

        <div class = "row">
        <div class = "col">
            <button type="submit" class="btn btn-primary" aria-label="Submit">Register</button>
        </div>
        </div>

        </form>
    </div>
</body>