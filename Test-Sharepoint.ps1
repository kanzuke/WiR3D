#requires -version 2
<#
.SYNOPSIS
  
.DESCRIPTION
  
.PARAMETER File
    
.INPUTS

.OUTPUTS

.NOTES
  Version:        1.0
  Author:         CNE GATINE Mathieu
  Creation Date:  16/02/2020
  Purpose/Change: Initial script development
  
.EXAMPLE


#>





#---------------------------------------------------------[Initialisations]--------------------------------------------------------

Import-Module Microsoft.Online.SharePoint.PowerShell -DisableNameChecking


#----------------------------------------------------------[Declarations]----------------------------------------------------------

$lists = @(
  "https://wiredme.sharepoint.com/"
)







#-----------------------------------------------------------[Functions]------------------------------------------------------------

function FunctionName {
  <#
    .DESCRIPTION
    Description of the function

    .PARAMETER computername
    Some parameter

    .EXAMPLE
    Some Example

    .NOTES
    This is just an example function.
    #>

    param (
      $OptionalParameters
    )
  
}




#-----------------------------------------------------------[Execution]------------------------------------------------------------



$lists

$SiteUrl = "https://wiredme.sharepoint.com/"
$ListName ="CMDB_TERMINAL"

$UserName='kanzuke@wiredme.onmicrosoft.com'
$Password =''
  
#Setup Credentials to connect
$Credentials = New-Object Microsoft.SharePoint.Client.SharePointOnlineCredentials($UserName,(ConvertTo-SecureString $Password -AsPlainText -Force))
  

#Set up the context
$Context = New-Object Microsoft.SharePoint.Client.ClientContext($SiteUrl) 
$Context.Credentials = $credentials
   
#Get the List
$List = $Context.web.Lists.GetByTitle($ListName)

#sharepoint online get list items powershell
$ListItems = $List.GetItems([Microsoft.SharePoint.Client.CamlQuery]::CreateAllItemsQuery()) 
$Context.Load($ListItems)
$Context.ExecuteQuery()       
 
write-host "Total Number of List Items found:"$ListItems.Count
 
#Loop through each item

foreach ($item in $ListItems) {
  $item.FieldValues
  #Write-Host $item["N_x00b0_s_x00e9_rie"]
  #Write-Host $item["Datedattribution"]
  #Write-Host $item["Statut"]
  #Write-Host $item["Attributiondanslecadrede"]
}

