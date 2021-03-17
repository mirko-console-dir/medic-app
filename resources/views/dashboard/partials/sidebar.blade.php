  <div class="d_flex_column" id="sidebar">
      <div class="detail d_flex_column">
          <ul class="list-unstyled">
              <li><a href="{{route('dashboard.')}}">
              <i class="fas fa-user"></i>
              My Profile</a></li>
              <li><a href="{{route('dashboard.doctors.edit', $user->slug)}}"> <i class="fas fa-pencil-alt"></i>Edit Profile</a></li>
              <li><a href=""> <i class="far fa-envelope"></i>My Messages</a></li>
              <li><a href=""> <i class="far fa-comment-dots"></i>My Reviews</a></li>
              <li><a href="{{route('dashboard.services.index')}}"> <i class="fas fa-notes-medical"></i>My Services</a></li>
              <li><a href=""> <i class="fas fa-chart-line"></i>Analytics</a></li>
              <li><a href=""> <i class="fas fa-donate"></i>Sponsorship</a></li>


          </ul>
      </div>

  </div>