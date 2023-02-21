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
                <span> Articles <span class="badge badge-primary">{{ $approve+$pending+$reject }}</span></span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                     @if($approve > 0)
                    <a href="{{ URL::route('article.approve') }}">Approve List <span class="badge badge-success">{{ $approve }}</span></a>
                     @else
                    <a href="javascript:void(0)">Approve List <span class="badge badge-danger">{{ $approve }}</span></a>
                    @endif
                     @if($pending > 0)
                    <a href="{{ URL::route('article.pending') }}">Pending List <span class="badge badge-warning">{{ $pending }}</span></a>
                     @else
                    <a href="javascript:void(0)">Pending List <span class="badge badge-danger">{{ $pending }}</span></a>
                    @endif
                    
                    @if($reject > 0)
                    <a href="{{ URL::route('article.reject') }}">Reject List <span class="badge badge-danger">{{ $reject }}</span></a>
                    @else
                    <a href="javascript:void(0)">Reject List <span class="badge badge-danger">{{ $reject }}</span></a>
                    @endif
                    
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('article-category.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span> Article Category </span>
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
            <a href="{{ URL::route('reviewer.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Reviewers </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('editor.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Editors </span>
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
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Articles <span class="badge badge-primary">{{ $approve+$pending+$reject }}</span></span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    @if($approve > 0)
                    <a href="{{ URL::route('reviewer.article.approve') }}">Approve List <span class="badge badge-success">{{ $approve }}</span></a>
                    @else
                    <a href="javascript:void(0)">Approve List <span class="badge badge-success">{{ $approve }}</span></a>
                    @endif
                    
                    @if($pending > 0)
                    <a href="{{ URL::route('reviewer.article.pending') }}">Pending List <span class="badge badge-warning">{{ $pending }}</span></a>
                    @else
                     <a href="javascript:void(0)"> Pending List <span class="badge badge-danger">{{ $pending }}</span></a>
                    @endif
                   
                     @if($reject > 0)
                    <a href="{{ URL::route('reviewer.article.reject') }}">Reject List <span class="badge badge-danger">{{ $reject }}</span></a>
                    @else
                    <a href="javascript:void(0)">Reject List <span class="badge badge-danger">{{ $reject }}</span></a>
                    @endif
                </li>
            </ul>
        </li>
        
         <li>
            <a href="{{ URL::route('reviewer.history') }}">
                <span class="icon"><i class="fas fa-history"></i></span>
                <span> Reviewer History </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('reviewer.profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>
        @endcan


        @can('isAuthor')
          <!--<li>
            
           <a href="{{ URL::route('author.article.index') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Articles <span class="badge badge-success">{{ $approve+$pending+$reject }}</span></span>
            </a>-->
        <li>
            <a href="{{ URL::route('author.issue.index') }}">
                <span class="icon"><i class="fas fa-question-circle"></i></span>
                <span> Overview </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('author.issue.index') }}">
                <span class="icon"><i class="fas fa-question"></i></span>
                <span> Stats </span>
            </a>
        </li>
        
         <!--<li>
            <a href="{{ URL::route('author.history') }}">
                <span class="icon"><i class="fas fa-history"></i></span>
                <span> History </span>
            </a>
        </li>-->

        <li>
            <a href="{{ URL::route('author.profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span>My Profile </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span>Account Settings </span>
            </a>
        </li>
        
        @endcan
        
        @can('isEditor')
        <li>
            <a href="{{ URL::route('editor.article.index') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Articles <span class="badge badge-primary">{{ $approve+$pending+$reject }}</span></span>
            </a>
            
        </li>

        <li>
            <a href="{{ URL::route('editor.issue.index') }}">
                <span class="icon"><i class="fas fa-question-circle"></i></span>
                <span> Issues </span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('editor.history') }}">
                <span class="icon"><i class="fas fa-history"></i></span>
                <span> History </span>
            </a>
        </li>
        
        

        <li>
            <a href="{{ URL::route('editor.profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>
        @endcan
        
        @can('isPublisher')
        <li>
            
            <a href="{{ URL::route('publisher.article.index') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Articles <span class="badge badge-primary">{{ $approve+$pending+$reject }}</span></span>
            </a>
            
        </li>

        <li>
            <a href="{{ URL::route('publisher.issue.index') }}">
                <span class="icon"><i class="fas fa-question-circle"></i></span>
                <span> Issues </span>
            </a>
        </li>
        
        <li>
            <a href="{{ URL::route('publisher.history') }}">
                <span class="icon"><i class="fas fa-history"></i></span>
                <span> History </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('publisher.profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>
        @endcan

    </ul>

</div>
<!-- End Sidebar -->