<!--- Sidemenu 
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>-->

        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('dashboard.index') }}">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span> Dashboard </span>
            </a>
        </li>

        @can('isAdmin')
		
        <!--<li class="nav-item">
            <a class="nav-link" href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Manuscripts</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ URL::route('article-category.index') }}">Manuscripts Type</a>
                    <a class="nav-link" href="{{ URL::route('article.approve') }}">Approve List</a> 
                    <a class="nav-link" href="{{ URL::route('article.pending') }}">Pending List</a> 
                    <a class="nav-link" href="{{ URL::route('article.reject') }}">Reject List</a> 
                </li>
            </ul>
        </li>-->
		
		<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				Manuscripts 
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown "> 
				<a href="{{ URL::route('article-category.index') }}" class="dropdown-item notify-item"><span>Manuscripts Type</span></a>
				<a href="{{ URL::route('article.approve') }}" class="dropdown-item notify-item"><span>Approve List</span></a>
				<a href="{{ URL::route('article.pending') }}" class="dropdown-item notify-item"><span>Pending List</span></a>
				<a href="{{ URL::route('article.reject') }}" class="dropdown-item notify-item"><span>Reject List</span></a> 
				<div class="dropdown-divider"></div> 
			</div>
		</li>
		
		<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				Users 
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown "> 
				<a href="{{ URL::route('author.index') }}" class="dropdown-item notify-item"><span>Authors</span></a>
				<a href="{{ URL::route('editor.index') }}" class="dropdown-item notify-item"><span>Editors</span></a>
				<a href="{{ URL::route('reviewer.index') }}" class="dropdown-item notify-item"><span>Reviewers</span></a>
				<a href="{{ URL::route('profile.index') }}" class="dropdown-item notify-item"><span>Publishers</span></a> 
				<a href="{{ URL::route('publisher.index') }}" class="dropdown-item notify-item"><span>Profile</span></a> 
				<div class="dropdown-divider"></div> 
			</div>
		</li> 
		
		<!-- <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Users</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ URL::route('author.index') }}">Authors</a>
                    <a class="nav-link" href="{{ URL::route('editor.index') }}">Editors</a> 
                    <a class="nav-link" href="{{ URL::route('reviewer.index') }}">Reviewers</a> 
                    <a class="nav-link" href="{{ URL::route('profile.index') }}">Publishers</a> 
                    <a class="nav-link" href="{{ URL::route('publisher.index') }}">Profile</a> 
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('article-category.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span> Manuscripts Type </span>
            </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('comment.index') }}">
                <span class="icon"><i class="fas fa-comments"></i></span>
                <span> Comments </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('requirement.index') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span> Requirements </span>
            </a>
        </li>

        <!--<li class="nav-item">
            <a class="nav-link" href="{{ URL::route('author.index') }}">
                <span class="icon"><i class="fas fa-user-edit"></i></span>
                <span> Authors </span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('editor.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Editors </span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('reviewer.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Reviewers </span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('publisher.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Publishers </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>
		-->

        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Settings </span>
            </a>
        </li>
        @endcan


        @can('isReviewer')
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('reviewer.article.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Invited </span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('reviewer.article.approve3') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Reviewing </span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('reviewer.article.completed') }}">
                <span class="icon"><i class="fas fa-list"></i></span>
                <span> Completed </span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-accusoft"></i></span>
                <span> Expired </span>
            </a>
        </li>

        @endcan


        @can('isAuthor')
         
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('author.article.create') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span>New Manuscript</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('author.article.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span>Active Manuscript</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('author.published') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span>Published Manuscript</span>
            </a>
        </li>
        
        @endcan
        
        @can('isEditor')
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('editor.article.create') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span>New Manuscript</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('editor.article.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span>Active Manuscript</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('editor.published') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span>Published Manuscript</span>
            </a>
        </li>
        
       
        @endcan
        
        @can('isPublisher')
        
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('publisher.article.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span>Active Manuscript</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('publisher.published') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span>Published Manuscript</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::route('reviewer.article.completed') }}">
                <span class="icon"><i class="fas fa-list"></i></span>
                <span> Reviewed </span>
            </a>
        </li>
        
        @endcan

    <!--</ul>

</div>
 End Sidebar -->