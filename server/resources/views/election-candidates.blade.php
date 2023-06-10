<div class="container wide">
  <?php include('views/components/messages/info/info.php') ?>
  <div class="page__header">
    <div class="group">
      <span class="group__title">Election Manager</span>
      <span class="group__description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="tab">
      <a href="election-candidates.php">
        <span class="selector active">Candidates</span>
      </a>
      <a href="election-voters.php">
        <span class="selector">Voters</span>
      </a>
    </div>
  </div>
  <div class="content group">
    <div class="content__row">
      <div class="actions spaced">
       <span class="title">Candidates</span>
        <form class="search">
          <div class="search__group">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search...">
          </div>
          <i class="fa-solid fa-xmark search__exit"></i>
        </form>
      </div>
      <table>
        <thead>
          <tr>
            <th class="col1">Candidate Name</th>
            <th class="col2">Votes</th>
            <th class="col3">Student ID</th>
            <th class="col4">Result</th>
            <th class="col5">Reason</th>
            <th class="col6">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 10; $i++) { ?>
              <tr>
                <td class="col1">Name Placeholder</td>
                <td class="col2">999</td>
                <td class="col3">CS101</td>
                <td class="col4">Win</td>
                <td class="col5">Neque porro quisquam est qui dolorem...</td>
                <td class="col6">
                  <a href="election-candidates-edit.php">
                    <button class="secondary">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </a>
                </td>
              </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="content__details">
     <div class="header-details">
      <div class="group">
       <span class="title">ELECTION RECORD</span>
       <span class="set">Set by: John Doe</span>
      </div>
      <button class="secondary">
        <i class="fa-solid fa-check-to-slot"></i>
      </button>
     </div>
     <div class="election-details">
      <span class="title">DETAILS</span>
      <div class="group">
       <span class="name">Election Start Time</span>
       <span class="value">01/01/2001 12:00:00 PM</span>
      </div>
      <div class="group">
       <span class="name">Election End Time</span>
       <span class="value">01/01/2001 12:00:00 PM</span>
      </div>
      <div class="group">
       <span class="name">Election Record Name</span>
       <span class="value">Election Value Name</span>
      </div>
      <div class="group">
       <span class="name">Election Start Time</span>
       <span class="value">Ut lorem libero, interdum sed faucibus sed, pretium sed felis. Cras congue tortor sem, vitae...</span>
      </div>
      <div class="group">
       <span class="name">Status</span>
       <span class="value">Canvassing</span>
      </div>
     </div>
     <div class="actions">
      <button class="primary">Finalize Record</button>
      <button class="secondary">Archive Record</button>
      <button class="secondary">Cancel Record</button>
     </div>
    </div>
  </div>
</div>