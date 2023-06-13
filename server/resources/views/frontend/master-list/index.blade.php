@extends('layouts.master')

@section('title', 'Student Master List')

@section('content')

  <div class="container">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Student Master List</span>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <div class="actions__btn">
            <a href="{{ route('master-list.create') }}">
              <button class="primary">
                <i class="fa-regular fa-square-plus"></i>
                <span class="name">Add Student</span>
              </button>
            </a>
            <label for="file-upload" class="secondary">
              <i class="fa-solid fa-file-import"></i>
              <span class="name">Import CSV</span>
            </label>
            <input 
              id="file-upload" 
              name="file-upload"
              type="file"
              style="display: none;"
            >
            <button 
              class="secondary"
              onclick="exportCsv()"
            >
              <i class="fa-solid fa-file-export"></i>
              <span class="name">Export CSV</span>
            </button>
          </div>
          <select class="filter" name="status">
            <option value="0">Select Status</option>
            <option value="1">Not Enrolled</option>
            <option value="2">Enrolled</option>
          </select>
          <form 
            class="search"
            action="{{ route('master-list.search') }}"
          >
            <div class="search__group">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" name="query" placeholder="Search...">
            </div>
            <i class="fa-solid fa-xmark search__exit"></i>
          </form>
        </div>
        <table>
          <thead>
            <tr>
              <th class="col1">Name</th>
              <th class="col2">ID</th>
              <th class="col3">College</th>
              <th class="col4">Role</th>
              <th class="col5">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
               <tr>
                  <td class="col1">{{ $student->full_name }}</td>
                  <td class="col2">{{ $student->student_id }}</td>
                  <td class="col3">{{ $student->college }}</td>
                  <td class="col4">
                    {{
                      $student->is_enrolled ?
                        'Enrolled' : 'Not Enrolled'
                    }}
                  </td>
                  <td class="col5">
                    <a href="{{ route('master-list.edit', $student->student_id) }}">
                      <button class="secondary">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                  </td>
              </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="pagination">
      <a href="#" class="group">
        <i class="fa-solid fa-angle-left"></i>
        <span class="name">PREVIOUS</span>
      </a>
      <a href="#">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <span class="ellipsis">...</span>
      <a href="#">101</a>
      <a href="#" class="group">
        <span class="name">NEXT</span>
        <i class="fa-solid fa-angle-right"></i>
      </a>
    </div>
  </div>

  <script>
    const file_upload = document.getElementById('file-upload');

    file_upload?.addEventListener('change', async (e) => {
      e.preventDefault();
      const file = e.target.files[0];
      const formData = new FormData();
      formData.append('sheet', file);
      const result = await axios.post(
        "{{ route('master-list.upload') }}",
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data'
          },
        },
      );
      if (result?.data) window.location.reload();
    });

    function exportCsv() {
      axios.get(
        route('master-list.export'),
        {
          responseType: 'blob'
        }
      ).then((response) => {
        // See https://stackoverflow.com/questions/41938718/how-to-download-files-using-axios
        const href = URL.createObjectURL(response.data);
        const link = document.createElement('a');
        link.href = href;
        link.setAttribute('download', 'export-master-list.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(href);
      });
    }
  </script>

@endsection
