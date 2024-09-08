
<footer class="footer">
    <div class="footer-bg">
        <img src="{{ asset("assets/images/footer.png") }}" alt='image' class='imgFluid' loading='lazy'>
    </div>
    <div class="container">
        <div class="row g-0">
            <div class="col-md-3">
                <div class="footer-content">
                    <a href="{{ route("index") }}" class="footer-logo"> <img src="{{ asset("assets/images/footer-logo.png") }}" alt='image' class='imgFluid' loading='lazy'></a>
                    <p>Our goal is at the heart of all that we do.</p>
                    <ul class="footer-icons">
                        <li><a href="#"><i class='bx bxl-facebook-circle'></i></a></li>
                        <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                        <li><a href="#"><i class='bx bxl-linkedin-square'></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 offset-md-1">
                <div class="footer-content">
                    <div class="footer-details">Quick links</div>
                    <ul class="footer-link">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">FAQ’s </a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-2 offset-md-1">
                <div class="footer-content">
                    <div class="footer-details">Usefull links</div>
                    <ul class="footer-link">
                    <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">FAQ’s</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 offset-md-1">
                <div class="footer-content">
                    <div class="footer-details">Contact Us</div>
                    <ul class="footer-link footer-contact">
                        <li><a href="#">+123456789</a></li>
                        <li><a href="#">contact@xcelcorp.com</a></li>
                        <li><a href="#">Lorem Ipsum Highway 12asffsaf Plaza,Matawan, AB 123456</a></li>
                    </ul>
                </div>
            </div>
        </div>
  
    </div>



</footer>
<div class="footer-copyright">
    <div class="title">Copyright © {{ date("Y") }} All Rights Reserved</div>
</div>


</body>
<?php include 'include/js.php'; ?>

</html>