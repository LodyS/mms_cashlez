<style>
    .badi {
        background-color:#3b5d7c;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    
    .card{
        background-color:#fff;
        border:none;
        height:500px;
        overflow:hidden;
    }
    
    .input-field{
        position:relative;
        margin-top:5px;
    }
    
    .input-field input{
        height:50px;
        outline:none !important;
        border:2px solid #eee;
       
    }
    
    .input-field input:focus{
        box-shadow:none;
        outline:none !important;
    }
    
    .input-field label{
        position:absolute;
        top:10px;
        left:6px;
        transition:all 0.5s;
        background-color:#fff;
        padding:0px 10px;
        border-radius:20px;
        
         
    }
    
    .input-field input:focus+label,
    .input-field input:valid+label
    {
        position:absolute;
        top:-10px;
        left:6px;
        font-size:13px;
      
    }
    
    .signup-button{
        height:50px;
        font-size:19px;
        text-transform:uppercase;
    }
    
    .right-side{
        
        position:relative;
        
    }
    
    .right-side-content{
        background-color:#ffffff;
        height:500px;
        width:100%;
        padding:10px;
        position:relative;
    }
    
    
    .right-side-content .content{
        position:absolute;
        top:50%;
        left:0%;
        padding:0px 40px;
    }
    
    .right-side span:nth-child(1){
        height:120px;
        width:75px;
        background-color:#ffb91d;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        left:-20px;
    }
    
    .right-side span:nth-child(2){
        height:50px;
        width:40px;
        background-color:#ffb91d;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        left:60px;
        top:20px;
    }
    
    .right-side span:nth-child(3){
        height:50px;
        width:40px;
        background-color:#ffffff;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        right:20px;
        top:-20px;
    }
    
    .right-side span:nth-child(4){
        height:140px;
        width:100px;
        background-color:#ffffff;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        right:40px;
        top:70px;
    }
    
    .right-side span:nth-child(5){
        height:140px;
        width:100px;
        background-color:#fcfcfc;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        right:30px;
        top:60px;
        object-fit:cover;
        overflow:hidden;
    }
    
    .right-side span:nth-child(6){
        height:140px;
        width:100px;
        background-color:#fcfcfc;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        top:400px;
        overflow:hidden;
    }
    
    .right-side span:nth-child(7){
        height:60px;
        width:40px;
        background-color:#ffffff;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        top:400px;
        right:10px;
        overflow:hidden;
    }
    
    .right-side span:nth-child(8){
        height:100px;
        width:70px;
        background-color:#ffffff;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        top:440px;
        right:40px;
        overflow:hidden;
    }
    
    
    .right-side span:nth-child(9){
        height:70px;
        width:40px;
        background-color:#f7f7f7;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        top:350px;
        right:90px;
        overflow:hidden;
        transition:all 0.5s;
        transition-delay:1s;
    }
    
    
    .right-side span:nth-child(10){
        height:50px;
        width:100px;
        background-color:#ffffff;
        border-radius:2px;
        display:flex;
        transform: skew(20deg);
        position:absolute;
        left:20px;
        top:340px;
        object-fit:cover;
        overflow:hidden;
        transition:all 0.5s;
        
    }
    
    .card:hover .right-side span:nth-child(10){
        left:20px;
        top:330px;
    }
    
    .card:hover .right-side span:nth-child(9){
        top:340px;
        right:90px;
    }
    
    .content{
        display:flex;
        color:#fff;
        justify-content:center;
        align-items:center;
    }
    
    .content h6{
        text-align:left;
    }
    
    .content span{
        font-size:12px;
    }
    </style>
    
    <body class="badi" height="70%">
        <div class="container"> 
            <div class="card"> 
                <div class="row g-0"> 
                    <div class="col-md-6" style="height:680px"> 
                        <div class="h-100 d-flex justify-content-center align-items-center"> 
                            <div class="py-4 px-3"> 
                                
                                <img src="data:image/png;base64,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" width="300px">
    
                                <h6 align="center">MERCHANT ON BOARDING</h6> 
    
                                <form action="{{ route('login') }}" method="POST" name="form">@csrf
                                    <div class="row g-2 mt-1"> 
                                        <div class="col-md-6"> 
                                            <div class="input-field"> 
                                            
                                            </div> 
                                        </div> 
                                            
                                            <div class="col-md-6"> 
                                                <div class="input-field"> 
                                                    
                                                </div> 
                                            </div> 
                                        </div> 
                                    
                                        <div class="row mt-2"> 
                                            <div class="col-md-12"> 
                                                <div class="input-field"> 
                                                    <input class="form-control" id="username" name="username" type="text"> 
                                                    <label for="username">Username</label> 
                                                </div> 
                                                @error('username')
                                                    <div class="alert alert-danger">User tidak valid</div>
                                                @enderror
                                            </div> 
                                        </div> 
                                    
                                        <div class="row mt-2 mb-2"> 
                                            <div class="col-md-12"> 
                                                <div class="input-field"> 
                                                    <input class="form-control" id="password" name="password" type="password"  > 
                                                    <label for="password">Password</label> 
                                                </div> 
                                                @error('password')
                                                    <div class="alert alert-danger">Password salah</div>
                                                @enderror
                                            </div> 
                                        </div> 
                                
                                        <div class="row mt-2"> 
                                            <div class="col-md-12"> 
                                                <button class="btn btn w-100 signup-button" style="background-color:#1B1742"><span style="color:white">Login</span></button> 
                                            </div> 
                                        </div> 
                                    </form>
                                </div> 
                            </div> 
                        </div> 
    
                        <div class="col-md-6"> 
                            <div class="right-side-content"> 
                                <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full/MTA-4645845/cashlez_cashlez-sunmi-p1-all-in-one-reader_full04.jpg" width="100%" height="630px">
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </body>
    
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        
    $("form[name='form']").validate({
        rules: {
            username : "required",
            password : "required",
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });
    
    function myFunction() 
    {
        var x = document.getElementById("password");
      
        if (x.type === "password")
            x.type = "text";
        else 
            x.type = "password";
        
    }
    </script>