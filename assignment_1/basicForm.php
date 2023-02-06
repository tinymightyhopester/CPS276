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
            <option selected value="MI">Michigan</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option>
            <option value="MO">Missouri</option>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Zipcode" aria-label="Zipcode">
        </div>
        </div><br/>

        <div class = "row">
        <div class = "col">
            <button type="submit" class="btn btn-primary" aria-label="Submit">Submit</button>
        </div>
        </div>

        </form>
    </div>
</body>