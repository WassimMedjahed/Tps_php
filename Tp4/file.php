<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Team Builder</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel=icon 
      href=https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6/svgs/solid/martini-glass-citrus.svg>
    <style>
      .bg-gris {
        background-color: #ccc;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
          <i class="fa-solid fa-martini-glass-citrus me-4"></i>
          VIP Cocktail
        </a>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="bg-gris p-4">
            <form id="invite-form">
              <div class="row">
                <div class="col-4">
                  <input
                    aria-label="Nom"
                    id="nom"
                    class="form-control"
                    placeholder="Nom"
                    required
                  />
                </div>
                <div class="col-4">
                  <input
                    aria-label="Prenom"
                    id="prenom"
                    class="form-control"
                    placeholder="Prenom"
                    required
                  />
                </div>
                <div class="col-1">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <table class="table table-striped mt-4">
            <tbody id="guest-list">
              <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th colspan="2">Actions</th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <footer class="py-5 bg-dark">
      <div class="container px-4 px-lg-5">
        <p class="m-0 text-center text-white">
          Copyright &copy; Seven Valley 2023
        </p>
      </div>
    </footer>
    <script>
      document.getElementById('invite-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const nom = document.getElementById('nom').value;
        const prenom = document.getElementById('prenom').value;

        if (nom && prenom) {
          addGuest(prenom, nom);
          document.getElementById('invite-form').reset();
        }
      });

      function addGuest(prenom, nom) {
        const guestList = document.getElementById('guest-list');
        const row = document.createElement('tr');
        row.classList.add('table-danger');
        
        row.innerHTML = `
          <td>${prenom}</td>
          <td>${nom}</td>
          <td>
            <a href="#" class="btn btn-danger" onclick="removeGuest(this)">
              <i class="fa fa-trash"></i>
            </a>
          </td>
          <td>
            <a href="#" class="btn btn-warning" onclick="toggleStatus(this)">
              <i class="fa fa-check"></i>
            </a>
          </td>
        `;
        
        guestList.appendChild(row);
      }

      function removeGuest(element) {
        element.closest('tr').remove();
      }

      function toggleStatus(element) {
        const row = element.closest('tr');
        row.classList.toggle('table-success');
        row.classList.toggle('table-danger');
      }
    </script>
  </body>
</html>
