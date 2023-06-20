@php($role = Auth::user()->role)

<div class="header">
  <div class="header__left">
    <div class="logo">
      COMELEC
    </div>
    {{-- <a href="{{ route('master-list.index') }}" class="logo">COMELEC</a> --}}
    @if ($role === 'p')
      <ul class="nav">
        <li>
          <a href="{{ route('access-code.index') }}">Access Code Generator</a>
        </li>
      </ul>
    @else
      <ul class="nav">
        <li>
          <a href="{{ route('master-list.index') }}">Student Master List</a>
        </li>
        <li>
          <a href="{{ route('student-accounts.index') }}">Students Accounts</a>
        </li>
        <li>
          <a href="{{ route('candidates.index') }}">Candidates List</a>
        </li>
        <li>
          <a href="{{ route('election.index') }}">Election Manager</a>
        </li>
        <li id="see-more-btn">
          <span class="name">See More</span>
          <i class="fa-solid fa-angle-up" id="see-more-angle"></i>
        </li>
        <li>
          <a href="{{ route('announcements.index') }}">Announcement Editor</a>
        </li>
        <li>
          <a href="{{ route('message-editor.index') }}">Message Editor</a>
        </li>
        <li>
          <a href="{{ route('positions.index') }}">Positions List</a>
        </li>
      </ul>
      <ul class="menu see-more">
        <li>
          <a href="{{ route('announcements.index') }}">Announcement Editor</a>
        </li>
        <li>
          <a href="{{ route('message-editor.index') }}">Message Editor</a>
        </li>
        <li>
          <a href="{{ route('positions.index') }}">Positions List</a>
        </li>
      </ul>
    @endif
  </div>
  <div class="header__right" id="user-btn">
    <div class="header__separator"></div>
    <div class="details">
      <span class="details__name">
        {{ Auth::user()->username }}
      </span>
      <span class="details__role">
        {{
          [
            's' => 'Super Admin',
            'a' => 'Admin',
            'm' => 'Student Accounts Manager',
            'c' => 'Commissioner',
            'p' => 'Poll Worker',
          ][$role]
        }}
      </span>
    </div>
    <div class="group">
      <i class="fa-solid fa-circle-user group__icon"></i>
      <i class="fa-solid fa-angle-up group__icon" id="user-angle"></i>
    </div>
  </div>
</div>