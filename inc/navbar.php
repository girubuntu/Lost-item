<!-- <nav class="navbar navbar-expand-lg sticky-top mb-5">
        <a class="navbar-brand ml-5" href="irihano_updated/index.php" style='color:white;'><img src="assets/img/newirihano.png" style="height: 50px;width: 150px;margin-left: 40px;" alt="" class="img-fluid"></a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navMenu"
        >
        <i class="fas fa-bars" style="color:#fff;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav text-center text-light ml-auto my-lg-0">
                <li class="nav-item active"><a class="nav-link active"  href='index.php'>ADD LOST ITEM</a></li>
                <li class="nav-item"><a class="nav-link"  href='foundItem.php'>ADD FOUND ITEM</a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">RECENT POSTS</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="viewLostPosts.php" style='color:black;'>LOST ITEMS</a>
                        <a class="dropdown-item" href="viewFoundPosts.php" style='color:black;'>FOUND ITEMS</a>
                    </div>
                </li>
                <li class="nav-item active"><a class="nav-link active"  href='login.php'>LOGIN</a></li>
                
            </ul>
        </div>
    </nav> -->
<style>
  .nav__cont {
    position: fixed;
    width: 70px;
    top:0;
    height: 100vh;
    z-index: 100;
    background-color: rgb(34, 34, 102);
    overflow:hidden;
    transition:width .3s ease;
    cursor:pointer;
    box-shadow:4px 7px 10px rgba(0,0,0,.4);
    @media screen and (min-width: 600px) {
    width: 80px;
  }
  }

.nav__cont:hover {
    width:280px;
  }
  
.nav {
  list-style-type: none;
  color:white;
}

.nav:first-child {
    padding-top:1.5rem;
  }

.nav__items {
  padding-bottom:2rem;
  font-family: 'roboto';
}

.nav__items a {
    position: relative;
    display:block;
    top:-35px;
    padding-left:35px;
    padding-right:5px;
    transition:all .3s ease;
    margin-left:35px;
    margin-right:10px;
    text-decoration: none;
    color:white;
    font-family: 'roboto';
    font-weight: 100;
    font-size: 1.35em;
     
  }

  
  .nav__items a:after {
      content:'';
       width: 100%;
       height: 100%;
       position: absolute;
       top:0;
       left:0;
       border-radius:2px;
       background:radial-gradient(circle at 94.02% 88.03%, #54a4ff, transparent 100%);
       opacity:0;
       transition:all .5s ease;
       z-index: -10;
       color:#fff;
     }
  .home a:after{
    background:none;
    z-index: 1;
  }

  .nav__items:hover a:after {
    opacity:1;
    color:#fff;
  }
  .nav__items svg, .nav__items i{
    position: relative;
    left:17px;
    cursor:pointer;
    @media screen and(min-width:600px) {
      width:32px;
      height:32px;
      left:-15px;
    }}

  /* dropdown */

  .dropdown-content {
display: none;
position: absolute;
top:30px;
width: 100%;
overflow: auto;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown:hover .dropdown-content {
display: block;
background-color: #FFFFFF
}
.dropdown-content a {
display: block;
color: #000000;
padding: 5px;
margin:0px;
text-decoration: none;
position: static;
transition:all .3s ease;
text-decoration: none;
color:grey;
font-family: 'roboto';
font-weight: 100;
font-size: normal;
}
.dropdown-content a:hover {
color: none;
background-color: none;
}
.dropdown-content a:after {
  position: static;
  background:none;
  opacity:0;
  transition:all .5s ease;
  z-index: 0;
  }

  .fa-chevron-down{
    position: relative;
    left:2px;
    cursor:pointer;
    @media screen and(min-width:600px) {
      left:-15px;
    }}
</style>
    <svg style="display:none;">
  <defs>

    <g id="home">
      <path fill="#90A4AE" d="M42,48H6c-3.3,0-6-2.7-6-6V6c0-3.3,2.7-6,6-6h36c3.3,0,6,2.7,6,6v36C48,45.3,45.3,48,42,48z"/>
      <path fill="#212121" d="M20.8,35.5v-9.6h6.4v9.6h8V22.7H40L24,8.3L8,22.7h4.8v12.8H20.8z"/>
    </g>

    <g id="search">
      <path fill="#90A4AE" d="M22.9,20.1h-1.5l-0.5-0.5c1.8-2.1,2.9-4.8,2.9-7.7C23.8,5.3,18.5,0,11.9,0S0,5.3,0,11.9s5.3,11.9,11.9,11.9
	    c3,0,5.7-1.1,7.7-2.9l0.5,0.5v1.4l9.1,9.1l2.7-2.7L22.9,20.1z M11.9,20.1c-4.5,0-8.2-3.7-8.2-8.2s3.7-8.2,8.2-8.2s8.2,3.7,8.2,8.2
	    S16.4,20.1,11.9,20.1z"/>
    </g>

    <g id="map">
      <path fill="#90A4AE" d="M16,14.2c-1,0-1.8,0.8-1.8,1.8s0.8,1.8,1.8,1.8c1,0,1.8-0.8,1.8-1.8S17,14.2,16,14.2z M16,0
	    C7.2,0,0,7.2,0,16c0,8.8,7.2,16,16,16s16-7.2,16-16C32,7.2,24.8,0,16,0z M19.5,19.5L6.4,25.6l6.1-13.1l13.1-6.1L19.5,19.5z"/>
    </g>

    <g id="planner">
      <path fill="#90A4AE" d="M28.4,3.6h-1.8V0h-3.6v3.6H8.9V0H5.3v3.6H3.6C1.6,3.6,0,5.1,0,7.1L0,32c0,2,1.6,3.6,3.6,3.6h24.9c2,0,3.6-1.6,3.6-3.6V7.1C32,5.1,30.4,3.6,28.4,3.6z M28.4,32H3.6V12.4h24.9V32z M7.1,16H16v8.9H7.1V16z"/>
    </g>

  </defs>
</svg>
<nav class="nav__cont">
  <ul class="nav">
    <li class="nav__items home">
    <i class="fas fa-home fa-lg"></i>
      <a href="https://irihano.rw"><img src="assets/img/newirihano.png" style="height: 40px;width: 100px;" alt=""></a>
    </li>
    
    <li class="nav__items ">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
        <use xlink:href="#search"></use>
      </svg> -->
      <i class="fas fa-plus-circle fa-lg"></i>
      <a href="lostItem.php">Add Lost Item</a>
    </li>
      
    <li class="nav__items ">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
        <use xlink:href="#map"></use>
      </svg> -->
      <i class="fas fa-plus-circle fa-lg"></i>
      <a href="foundItem.php">Add Found Item</a>
    </li>
      
    <li class="nav__items">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 35.6">
        <use xlink:href="#planner"></use></svg> -->
      <i class="fas fa-columns fa-lg"></i>
      <a href="index.php">View Recent Posts</a>
      <!-- <div class="dropdown-content">
          <a class="dropdown-item" href="viewLostPosts.php" >Lost Items</a>
          <a class="dropdown-item" href="viewFoundPosts.php">Found Items</a>
      </div> -->
    </li>

    <li class="nav__items">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 35.6">
        <use xlink:href="#planner"></use></svg> -->
        <i class="far fa-user fa-lg"></i>
      <a href="login.php">Login</a>
      <!-- <div class="dropdown-content">
          <a class="dropdown-item" href="viewLostPosts.php">Admin</a>
          <a class="dropdown-item" href="viewFoundPosts.php">User</a>
      </div> -->
    </li>
    <li class="nav__items">
        <i class="far fa-user fa-lg"></i>
      <a href="login.php">Admin Dashboard</a>
    </li>
  </ul>
</nav>
