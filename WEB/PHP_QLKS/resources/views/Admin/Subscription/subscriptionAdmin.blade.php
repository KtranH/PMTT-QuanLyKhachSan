<form id="dataForm" action="testPusher" method="post">
    @csrf
    <input type="text" name="data" placeholder="Enter data">
    <button type="submit">Submit</button>
</form>