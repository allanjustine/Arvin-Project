<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
    <span alt="logo" class="img-fluid rounded-circle img-responsive" style="width: 30px; margin-left: 50px"></span>
    <a href="/" style="text-decoration: none; color: black; font-size: 30px;">Mini Capstone Project</a>
    <ul class="navbar-nav">
        @role('writer')
        <li class="nav-item">
          <a class="nav-link {{ 'dashboard' == request()->path() ? 'active' : '' }}" id="hover-nav" href="{{ '/' }}">Dashboard</a>
        </li>
        @endrole
        @role('admin')
        <li class="nav-item">
          <a class="nav-link {{ 'admin' == request()->path() ? 'active' : '' }}" id="hover-nav" href="{{ '/admin' }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ 'logs' == request()->path() ? 'active' : '' }}" id="hover-nav" href="{{ '/logs' }}">Logs</a>
        </li>
        <li class="nav-item">
        @endrole
          <a class="nav-link {{ 'recentPost' == request()->path() ? 'active' : '' }}" id="hover-nav" href="{{ '/recentPost' }}">Recent Posts</a>
        </li>
        @role('admin')
        <li class="nav-item">
          <a class="nav-link {{ 'admin/users' == request()->path() ? 'active' : '' }}" id="hover-nav" href="{{ route('admin.users.index') }}">Users</a>
        </li>
        @endrole
      </ul>
      <div class="dropdown mx-auto">
                <a class="btn dropdown-toggle" id="buttt" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="select3" style="background-color: white;">
                    <li class="nav-item  {{ 'create' == request()->path() ? 'active2' : '' }}"  id="hover-drop">
                        <a style="margin-left: 20px" class="nav-link" href="/create">Create Post</a>
                    </li>
                    <li class="nav-item  {{ 'myPost' == request()->path() ? 'active2' : '' }}" id="hover-drop">
                        <a style="margin-left: 20px"  class="nav-link" href="/myPost">My Post</a>
                    </li>
                    <li class="nav-item"  id="hover-drop">
                        <a href="{{ '/logout' }}" class="nav-link" style="text-decoration: none; margin-right: 10px;"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                    </li>
                </div>
            </div>
</nav>

<style>
  a{
    margin-left: 20px;
  }
  #select3 {
    width: 150px;
    height: auto;
  }
  #hover-nav {
    border: 3px solid transparent;
    border-radius: 15px;
  }
  #hover-nav:hover {
    border-bottom: 3px solid rgb(30, 244, 155);
    color: white;
    background-image: url("images/bg.gif");
  }
  #hover-drop {
    padding: 10px;
  }
  #hover-drop:hover {
    background-color:rgb(224, 225, 225);
    background-image: url("images/bg.gif");
    color: white;
  }
  .active {
    background-color:rgba(140, 144, 142, 0.092);
  }
  .active2 {
    background-color:rgba(140, 144, 142, 0.092);
  }
</style>
