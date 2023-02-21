<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="{{ URL::route('dashboard.index') }}">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span> Dashboard </span>
            </a>
        </li>

        @can('isAdmin')
        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Manuscripts</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    
                    <a href="{{ URL::route('article.approve') }}">Approve List</a>
                  
                    <a href="{{ URL::route('article.pending') }}">Pending List</a>
                    
                    <a href="{{ URL::route('article.reject') }}">Reject List</a>
                   
                    
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('article-category.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span> Manuscripts Type </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('comment.index') }}">
                <span class="icon"><i class="fas fa-comments"></i></span>
                <span> Comments </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('requirement.index') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span> Requirements </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('author.index') }}">
                <span class="icon"><i class="fas fa-user-edit"></i></span>
                <span> Authors </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('editor.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Editors </span>
            </a>
        </li>
        
         <li>
            <a href="{{ URL::route('reviewer.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Reviewers </span>
            </a>
        </li>
        
         <li>
            <a href="{{ URL::route('publisher.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Publishers </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Settings </span>
            </a>
        </li>
        @endcan


        @can('isReviewer')
        
        <li>
            <a href="{{ URL::route('reviewer.article.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Invited </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Reviewing </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-list"></i></span>
                <span> Completed </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-accusoft"></i></span>
                <span> Expired </span>
            </a>
        </li>

        @endcan


        @can('isAuthor')
         
        
        <li>
            <a href="{{ URL::route('author.article.create') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span>New Manuscript</span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('author.article.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span>Active Manuscript</span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('author.published') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span>Published Manuscript</span>
            </a>
        </li>
        
        @endcan
        
        @can('isEditor')
        
        <li>
            <a href="{{ URL::route('editor.article.create') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span>New Manuscript</span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('editor.article.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span>Active Manuscript</span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('editor.published') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span>Published Manuscript</span>
            </a>
        </li>
        
       
        @endcan
        
        @can('isPublisher')
        
        
        <li>
            <a href="{{ URL::route('publisher.article.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span>Active Manuscript</span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('publisher.published') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span>Published Manuscript</span>
            </a>
        </li>
        
       
        @endcan

    </ul>

</div>
<!-- End Sidebar -->