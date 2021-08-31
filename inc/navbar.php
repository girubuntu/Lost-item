<style>
  body {
    font-family: 'Open Sans', sans-serif;
  }

  .nav__cont {
    position: fixed;
    width: 70px;
    top: 0;
    height: 100vh;
    z-index: 100;
    font-family: 'Open Sans', sans-serif;
    background-color: rgb(34, 34, 102);
    overflow: hidden;
    transition: width .3s ease;
    cursor: pointer;
    box-shadow: 4px 7px 10px rgba(0, 0, 0, .4);

    @media screen and (min-width: 600px) {
      width: 80px;
    }
  }

  .nav__cont:hover {
    width: 280px;
  }

  .nav {
    list-style-type: none;
    color: white;
  }

  .nav:first-child {
    padding-top: 1.5rem;
  }

  .nav__items {
    padding-bottom: 1rem;
  }

  .nav__items a {
    position: relative;
    display: block;
    top: -35px;
    padding-left: 35px;
    padding-right: 5px;
    transition: all .3s ease;
    margin-left: 35px;
    margin-right: 10px;
    text-decoration: none;
    color: white;

    font-size: 1.35em;

  }


  .nav__items a:after {
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 2px;
    background: radial-gradient(circle at 94.02% 88.03%, #54a4ff, transparent 100%);
    opacity: 0;
    transition: all .5s ease;
    z-index: -10;
    color: #fff;
  }

  .home a:after {
    background: none;
    z-index: 1;
  }

  .nav__items:hover a:after {
    opacity: 1;
    color: #fff;
  }

  .nav__items svg,
  .nav__items i {
    position: relative;
    left: 17px;
    cursor: pointer;

    @media screen and(min-width:600px) {
      width: 32px;
      height: 32px;
      left: -15px;
    }
  }


  /* The container <div> - needed to position the dropdown content */

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    left: 60px;
    top: 21px;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;

  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #f1f1f1
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown-content a {
    position: static;
    transition: all .3s ease;
    font-size: 16px;
    color: black;
    padding: 8px 10px;
    margin-left: auto;
    margin-right: auto;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:after {
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    border-radius: 2px;
    background: #fff;
    opacity: 0;
    transition: all .5s ease;
    z-index: -10;
    color: #fff;
  }
</style>
<nav class="nav__cont">
  <ul class="nav">
    <li class="nav__items home">
      <i class="fas fa-home fa-lg"></i>
      <a href="https://irihano.rw">Go to Irihano</a>
    </li>

    <li class="nav__items ">
      <i class="fas fa-plus-circle fa-lg"></i>
      <a href="lostItem.php">Add Lost Item</a>
    </li>

    <li class="nav__items ">
      <i class="fas fa-plus-circle fa-lg"></i>
      <a href="foundItem.php">Add Found Item</a>
    </li>

    <li class="nav__items dropdown">
      <i class="fas fa-columns fa-lg"></i>
      <a href="#" class='dropbtn'>View Recent Posts</a>
      <div style="width: 100%;" class="dropdown-content">
        <a style="background-color: rgb(34, 34, 102); color: #fff;" class="dropdown-item" href="index.php">&bull; View Lost Items</a>
        <a style="background-color: rgb(34, 34, 102); color: #fff;" class="dropdown-item" href="viewFoundPosts.php">&bull; View Found Items</a>
      </div>
    </li>

    <li class="nav__items">
      <i class="far fa-user fa-lg"></i>
      <a href="login.php">Login</a>
    </li>
  </ul>
</nav>