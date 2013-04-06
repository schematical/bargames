<?php
class BGSimpleReportPanel extends MJaxTable{
	public function __construct($objParentControl, $strControlId = null){
		parent::__construct($objParentControl, $strControlId);
		$this->AddCssClass('table');
		$this->AddColumn('Stat','Stat');
	   	$this->AddColumn('Count','Count');
		
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiApplications',
				'Stat'
			);
			$objRow->AddData(				
				ApiApplication::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiApplicationPermissionLevel_tpcds',
				'Stat'
			);
			$objRow->AddData(				
				ApiApplicationPermissionLevel_tpcd::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiApplicationStatus_tpcds',
				'Stat'
			);
			$objRow->AddData(				
				ApiApplicationStatus_tpcd::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiCalls',
				'Stat'
			);
			$objRow->AddData(				
				ApiCall::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiDevelopers',
				'Stat'
			);
			$objRow->AddData(				
				ApiDeveloper::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiRequestTokens',
				'Stat'
			);
			$objRow->AddData(				
				ApiRequestToken::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiUserPermissions',
				'Stat'
			);
			$objRow->AddData(				
				ApiUserPermission::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'ApiUserPermissionTypes',
				'Stat'
			);
			$objRow->AddData(				
				ApiUserPermissionType::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'Bartenders',
				'Stat'
			);
			$objRow->AddData(				
				Bartender::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'BartenderVenues',
				'Stat'
			);
			$objRow->AddData(				
				BartenderVenue::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'Players',
				'Stat'
			);
			$objRow->AddData(				
				Player::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'PlayerApps',
				'Stat'
			);
			$objRow->AddData(				
				PlayerApp::QueryCount(''),
				'Count'
			);
		
			$objRow = new MJaxTableRow($this);
			$objRow->AddData(
				'Venus',
				'Stat'
			);
			$objRow->AddData(				
				Venu::QueryCount(''),
				'Count'
			);
		
		
	}



}
?>