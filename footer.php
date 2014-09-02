<html>
    <head>
        <style>
            #footer{
                text-align: center;
                color: white;

            }
            div.fcontainer {
                background: #394349;
                height: 10em;
                position: relative 
            }              /* 1 */
            div.fcontainer p {
                position: relative;               /* 2 */
                top: 50%;                         /* 3 */
                transform: translate(0, -50%) 
            }
            </style>
        </head>
        <body>
            <div class="fcontainer">
            <p id ="footer" align="center">&copy; <?php echo date("Y"); ?> National Volunteering Secretariat. All rights reserved.</p>
        </div>
    </body>
</html>