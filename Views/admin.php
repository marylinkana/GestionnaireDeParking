
<table class="pure-table">
<thead>
  <tr>
    <td colspan="3">
      <form action="?controleur=taches&action=ajouter" class="pure-form"  method="post">
        <!--label>Nouvelle :</label-->
        <input type="submit" value="Ajouter" class="pure-button pure-button-primary">
        <input type="text" size="40" name="texte" id="tache-texte">
        <input type="date" size="40" name="date" id="tache-texte">
      </form>

      <form action="?controleur=taches&action=lister" class="pure-form"  method="post">
        <!--label>Recherche :</label-->
        <input type="submit" value="Recherche" class="pure-button pure-button-primary">
        <input type="text" size="60" name="texte" id="tache-texte">
      </form>

    </td>
  </tr>
  <th>Fait</th>
  <th style="display:flex;">
    <form action="?controleur=taches&action=mettreAJour" class=""  method="post">
      <input type="submit" value="Mettre à jour" class="">
    </form>
    <form action="?controleur=taches&action=lister" class=""  method="post">
      <input type="hidden" name="termine" value="termine">
      <input type="submit" value="Tâches terminées" class="">
    </form>
    <form action="?controleur=taches&action=lister" class=""  method="post">
      <input type="hidden" name="termine" value="enAttente" >
      <input type="submit" value="Tâches en attentes" class="">
    </form>
    <form action="?controleur=taches&action=effacer" class=""  method="post">
      <input type="hidden" value="termine" name="id" />
      <input type="submit" value="- Terminées" class="">
    </form>
  </th>
  <td></td>
</thead>
<tbody>

   <tr>
    <td>
      <form action="?controleur=taches&action=modifier" class="pure-form"  method="post">
        <input type="hidden" value="" name="id" />
        <input type="hidden" value="termine" name="termine" />
        <input type="checkbox" value="enAttente" />
      </form>

    </td>
    <td>
      <form action="?controleur=taches&action=modifier" class="pure-form"  method="post">
        <input type="hidden" value="" name="id" />
        <input type="text" value="" size="13" name="texte"/>
        <input type="datetime" value="" size="13" name="texte"/>
        <input type="datetime" value="" size="13" name="texte"/>
        <input type="text" value="" size="13" name="texte"/>
        <input type="submit" value="Modifier" />
      </form>
    </td>
    <td>
      <form action="?controleur=taches&action=effacer" class="pure-form"  method="post">
        <input type="hidden" value="" name="id" />
        <input type="submit" value="✗" class="pure-button" />
      </form>
    </td>
  </tr>
</tbody>
</table>
