<link rel="stylesheet" type="text/css" href="support/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="support/sc_printer/css/sc_printer.css">

<section class="content">
	<div class="container-fluid">
		
	<div class="row">
		<div class="col-md-12"> 
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Senior Citizen ID Printer</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">

							<table id="table-senior" class="table sc-table">
								<thead>
					                <tr>
					                    <th>unique ID</th>
					                    <th>ID</th>
					                    <th>Family Name</th>
					                    <th>Given Name</th>
					                    <th>Middle Initial</th>
					                    <th>Date of Birth</th>
					                    <th>Gender</th>
					                    <th>Age</th>
					                    <th>Civil Status</th>
					                    <th>Purok</th>
					                    <th>Barangay</th>
					                    <th>signature</th>
					                    <th>picture</th>
					                    <th>qr</th>
					                    <th>printed</th>
					                    <th>Status</th>
					                </tr>
								</thead>
							</table>

						</div>

						<div class="col-md-4">
							<span>underconstruction</span>
							<br>
							<span>total: 0</span>
							<br>
							<ul id="print-list"></ul>
							<br>
							<button id="btn-print-front">Print Fron</button>
							<button id="btn-print-back">Print Back</button>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><h5 class="card-title">Preview</h5></div>

				<div class="card-body">
					<div class="row">
						<div id="print-preview" class="print-preview">
							<!-- template -->
								
							<!-- template -->
						</div>
							<div>
								<img id="template-back" class="template-back" src="support/sc_printer/img/template/back.jpg">
							</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div id="modal-print" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div id="modal-print-body" class="modal-body">
					<iframe id="iframe-print" src=""></iframe>
				</div>
			</div>
		</div>
	</div>

	<div id="cache"></div>

	</div>
</section>

<script src="support/plugins/jquery/jquery.min.js"></script>
<script src="support/plugins/datatables/jquery.dataTables.js"></script>

<script src="https://cdn.jsdelivr.net/g/filesaver.js"></script>
<script src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.2.11/dist/jspdf.plugin.autotable.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

<script src="support/sc_printer/js/sc_printer.js"></script>

