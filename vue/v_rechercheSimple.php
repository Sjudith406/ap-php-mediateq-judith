<h4>Recherche simple dans le catalogue </h4>
<br/>

<div class="card">
    <div class="card-body">
        <form method="POST" action="?action=rechercheSimple">
            <div class="form-row recherches_form">
                <div class="form-group col-md-2 hist">
                    <select class="form-control" name="searchType" id="searchType" required >
                        <option value="tout" selected>Tout</option>
                        <option value="livre" >Livre</option>
                        <option value="dvd" >DVD</option>
                        <option value="revue" >Revue</option>
                    </select>
                </div>
                <div class="form-group col-md-8 hist">
                    <input id="searchText" name="searchText" class="form-control" placeholder="Saisissez les termes de votre recherche." type="text">
                </div>

                <div class="form-group col-md-2 hist">
                    <button type="submit" name="recherche" class="btn btn-primary col-md-12"><span class="glyphicon glyphicon-floppy-disk"></span>recherche</a>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
.hist {
  margin-bottom: 10px;
}

.hist button {
  width: 200px;
  margin-right: 10px;
  margin-bottom: 10px;
}
.recherches_form {
  display: flex;
  justify-content: center;
  margin: 5px 7px;
  padding: 2px 8px;
}
</style>
