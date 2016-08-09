<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>API Documentation </title>
    <link rel="stylesheet" href="jquery-ui.css">
    <script src="jquery.js"></script>
    <script src="jquery-ui.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
<script>var pathvars = {worker: '/service-worker.js',manifest: '/manifest.json'};var quvu = {};quvu.websiteId='57a9bb9581556b791979cbfd';quvu.segmentName  = 'default';quvu.serverUrl = 'https://www.quvu.com/api/';</script><script type='text/javascript' src='https://cdn.quvu.com/launchpad.js'></script>
</head>
<style>

    h4{
        color:grey;margin-left:10px;
    }
    th,td{
        text-align:center;
    }
    #accordion
    {
        position:relative;
        width:80%;
        left:10%;
    }

</style>

<body style="background:#123126;" >
<center><h1 class="teal"> API DOCUMENTATION </h1>

    <h3 class="teal-text">Wingify -Product REST API</h3>

</center>
<h6 id="accordion" class="green-text">User API</h6>


<div id="accordion">
    <ul class="collapsible popout white-text transparent grey-border z-depth-5" data-collapsible="accordion">
        <li>
            <div class="collapsible-header teal waves-effect waves-purple"> <p>/register  <io class="new badge orange">POST</io>  To register a user</p></div>
            <div class="collapsible-body" >
                <table  class="table">
                    <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                    <tr><td style="color:red">name</td><td>*</td><td>json/formData</td><tr>
                    <tr><td style="color:red">email</td><td>*</td><td>json/formData</td><tr>
                    <tr><td style="color:red">password</td><td>*</td><td>json/formData</td><tr>
                </table>

                <h6>Info</h6>
                <p>
                    This endpoint of for registering the user.
                </p>
                <br>
                <h6>Return</h6>
                <p>Json with message and success tags for example
    <pre><code class="prettyprint" >

        {
        "message":"User Succesfully Created",
        "success":true
        }
    </code></pre> </p>

            </div>
        </li>




        <li>
            <div class="collapsible-header teal waves-effect waves-purple"> <p>/login  <io class="new badge orange">POST</io> To User login </p></div>
            <div class="collapsible-body" >
                <table  class="table">
                    <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                    <tr><td style="color:red">email</td><td>*</td><td>json/formData</td><tr>
                    <tr><td style="color:red">password</td><td>*</td><td>json/formData</td><tr>
                </table>

                <h4>Info</h4>
                <p>
                    This endpoint of for logging in the user. Send the email and password in same format.
                </p>
                <br>
                <h4>Return</h4>
                <p> Json with message ,success and token . if user is not valid token will be null  for example

     <pre><code class="prettyprint">
         {
         "message":"Succesfully logged in",
         "token":"399465c5867fe6802cac28ffb6f6cbf370c2d2e01e12a5c21aaf188fd34d",
         "success":true
         }
     </code></pre>
                </p>
            </div>
        </li>





        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/logout  <io class="new badge orange">GET/POST</io>  To logout </p>
        </div> <div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">accessToken</td><td>*</td><td>header</td><tr>
            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for users to logout.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json of logged out with message and success for example <br>

        <pre><code class="prettyprint">
            {
            "message":"successfully log out"
            ,"success":true
            }
        </code></pre>

            </p>


        </div>
        </li>

    </ul>
</div>

<h6 id="accordion" class="green-text">Category API</h6>
<div id="accordion">
    <ul class="collapsible popout white-text transparent grey-border z-depth-5" data-collapsible="accordion">

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/addCategory  <io class="new badge orange">POST</io> To add a Category </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">name</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">display_name</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for adding new Category.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message ,success and token for example
       <pre><code class="prettyprint">
           {
           "message" : "Category Successfully added"
           ,"success": "true"
           }
       </code></pre>
            </p>


        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/updateCategory  <io class="new badge orange">POST</io> To update a Category </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">name</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">display_name</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for updating existing Category.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and successfor example
         <pre><code class="prettyprint">
             {
             "message" : "Category Successfully updated"
             ,"success": "true"
             }
         </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/deleteCategory  <io class="new badge orange">POST</io> To delete a Category </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>



            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for delete existing Category.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and success .for example
    <pre><code class="prettyprint">
        {
        "message" : "Category Successfully deleted"
        ,"success": "true"
        }
    </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/category <io class="new badge orange">GET/POST</io> To get or search a Category </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>

                <tr><td style="color:green">filter</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">filter_text</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">sort</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for get all  existing Category and serach in category using filter and filter_text.<br>
                filter can be 'name' ,'description' and 'display_name' and filter_text can be filter respective search text.

            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message ,data and success. for example
        <pre><code class="prettyprint">
            {
            "message":"Category ",
            "success":true,
            "data":[
            {
            "id":"32",
            "name":"Footwear",
            "display_name":"Footwear",
            "description":"This is Footwear Category",
            "created_at":"2016-01-18 08:17:30",
            "updated_at":"0000-00-00 00:00:00"
            },
            {
            "id":"34",
            "name":"Electorincs",
            "display_name":"Electorincs",
            "description":"This is ElectorincsCategory",
            "created_at":"2016-01-18 08:18:10",
            "updated_at":"0000-00-00 00:00:00"
            },
            {
            "id":"33",
            "name":"Dressing",
            "display_name":"Dressing",
            "description":"This is Dressing Category",
            "created_at":"2016-01-18 08:17:49",
            "updated_at":"0000-00-00 00:00:00"
            }
            ]
            }
        </code></pre>
            </p>



        </div>
        </li>



    </ul>

</div>


<h6 id="accordion" class="green-text">Brands API</h6>
<div id="accordion">
    <ul class="collapsible popout white-text transparent grey-border z-depth-5" data-collapsible="accordion">

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/addBrand  <io class="new badge orange">POST</io> To add a Brand </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">name</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">display_name</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">category_id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for adding new Brand.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message ,success and token for example
          <pre><code class="prettyprint">
              {
              "message" : "Brand Successfully added"
              ,"success": "true"
              }
          </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/updateBrand  <io class="new badge orange">POST</io> To update a Brand </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">name</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">display_name</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">category_id</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for updating existing Brand.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and successfor example

          <pre><code class="prettyprint">
              {
              "message" : "Brand Successfully updated"
              ,"success": "true"
              }
          </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/deleteBrand  <io class="new badge orange">POST</io> To delete a Brand </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>



            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for delete existing Brand.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and success. for example
            <pre><code class="prettyprint">
                {
                "message" : "Brand Successfully deleted"
                ,"success": "true"
                }
            </code></pre></p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/brand <io class="new badge orange">GET/POST</io> To get or search a Brand </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>

                <tr><td style="color:green">filter</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">filter_text</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">sort</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for get all  existing Brand and serach in category using filter and filter_text.<br>
                filter can be 'name' ,'description','category' and 'display_name' .filter_text can be filter respective search text.

            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message ,data and success for example
        <pre><code class="prettyprint">
            {
            "message":"Brands ",
            "success":true,
            "data":[
            {
            "id":"2",
            "name":"Dressing",
            "display_name":"Puma",
            "description":"This is Puma Brands"
            }
            ]
            }
        </code></pre>
            </p>



        </div>
        </li>


    </ul>

</div>




<h6 id="accordion" class="green-text">Discount API</h6>
<div id="accordion">
    <ul class="collapsible popout white-text transparent grey-border z-depth-5" data-collapsible="accordion">

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/addDiscount  <io class="new badge orange">POST</io> To add a Discount </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">name</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">discount</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for adding new Discount.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message ,success and token for example
               <pre><code class="prettyprint">
                   {
                   "message" : "Discount Successfully added"
                   ,"success": "true"
                   }
               </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/updateDiscount  <io class="new badge orange">POST</io> To update a Discount </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">name</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">discount</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for updating existing Discount.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and successfor example
             <pre><code class="prettyprint">
                 {
                 "message" : "Discount Successfully updated"
                 ,"success": "true"
                 }
             </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/deleteDiscount  <io class="new badge orange">POST</io> To delete a Discount </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>



            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for delete existing Discount.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and success .for example
              <pre><code class="prettyprint">
                  {
                  "message" : "Discount Successfully deleted"
                  ,"success": "true"
                  }
              </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/discount <io class="new badge orange">GET/POST</io> To get or search a Discount </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>

                <tr><td style="color:green">filter</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">filter_text</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">sort</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for get all  existing Discount and serach in Discount using filter and filter_text.<br>
                filter can be 'discount' and 'description' .filter_text can be filter respective search text.

            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message ,data and success for example
         <pre><code class="prettyprint">
             {
             "message":"Discount ",
             "success":true,
             "data":[
             {
             "id":"4",
             "discount":"20",
             "description":"20% off discount",
             "created_at":"2016-01-18 01:12:49",
             "updated_at":"0000-00-00 00:00:00"
             }
             ]
             }
         </code></pre>





        </div>
        </li>


    </ul>

</div>


<h6 id="accordion" class="green-text">Product API</h6>
<div id="accordion">
    <ul class="collapsible popout white-text transparent grey-border z-depth-5" data-collapsible="accordion">

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/addProduct  <io class="new badge orange">POST</io> To add a Product </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">name</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">price</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">category_id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">brand_id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:red">discount_id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">fid</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for adding new Product.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and success .for example
              <pre><code class="prettyprint">
                  {
                  "message" : "Product Successfully added"
                  ,"success": "true"
                  }
              </code></pre>
            </p>


        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/updateProduct  <io class="new badge orange">POST</io> To update a Product </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>
                <tr><td style="color:green">name</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">price</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">category_id</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">brand_id</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">discount_id</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">fid</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">description</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for updating existing Product.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and success .for example
              <pre><code class="prettyprint">
                  {
                  "message" : "Product Successfully updated"
                  ,"success": "true"
                  }
              </code></pre>
            </p>



        </div>
        </li>

        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/deleteProduct  <io class="new badge orange">POST</io> To delete a Product </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>
                <tr><td style="color:red">token</td><td>*</td><td>header</td><tr>
                <tr><td style="color:red">id</td><td>*</td><td>fromData</td><tr>



            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for delete existing Product.
            </p>
            <br>
            <h4>Return</h4>
            <p>Json with message and success .for example
              <pre><code class="prettyprint">
                  {
                  "message" : "Product Successfully deleted"
                  ,"success": "true"
                  }
              </code></pre>
            </p>



        </div>
        </li>


        <li><div class="collapsible-header teal waves-effect waves-purple">
            <p>/product <io class="new badge orange">GET/POST</io> To get or search a Product </p>
        </div><div class="collapsible-body">

            <table  class="table">
                <tr><th>Parameters</th><th>Optional(+)/Mandatory(*)</th><th>format</th><tr>

                <tr><td style="color:green">filter</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">filter_text</td><td>+</td><td>fromData</td><tr>
                <tr><td style="color:green">sort</td><td>+</td><td>fromData</td><tr>


            </table>

            <h4>Info</h4>
            <p>
                This endpoint is for get all  existing Product and serach in Product using filter and filter_text.<br>
                filter can be 'name' ,'category' , 'brand' , 'discount, and 'description' .filter_text can be filter respective search text.

            </p>
            <br>
            <h4>Return</h4>

            <p>Json with message ,data and success for example <br>
        <pre><code class="prettyprint">{
            "message": "products ",
            "success": true,
            "data": [
            {
            "name": "Puma Unisex Cat 3",
            "description": "Puma Unisex is a sneaker and highly comfortable shoe.",
            "price": "1800",
            "category": "Footwear",
            "brand": "puma",
            "discount": "20"
            },
            {
            "name": "Puma Back Casual",
            "description": "Casual shoe  mast wala",
            "price": "999",
            "category": "Dressing",
            "brand": "puma",
            "discount": "20"
            }
            ]
            }</code></pre>
            .</p>



        </div>
        </li>


    </ul>

</div>

<br><br><br><br><br><center class="teal-text">Designed by Subhash</center><br><br><br>
</body>
</html>


<script>
    $(document).ready(function(){
        $('.collapsible').collapsible({
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
    });
</script>
