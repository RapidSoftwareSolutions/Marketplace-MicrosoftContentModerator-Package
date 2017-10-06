[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/MicrosoftContentModerator/functions?utm_source=RapidAPIGitHub_MicrosoftContentModeratorFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# MicrosoftContentModerator Package
Machine-assisted moderation of text and images.Image moderation - enhance your ability to detect potentially offensive or unwanted images through machine-learning based classifiers, custom blacklists, and optical character recognition (OCR).Text moderation - helps you detect potential profanity in more than 100 languages and match text against your custom lists automatically. Content Moderator also checks for possible personally identifiable information (PII).
* Domain: [azure.microsoft.com](https://azure.microsoft.com/en-us/services/cognitive-services/content-moderator/)
* Credentials: apiKey

## How to get credentials: 
0. Subscribe to the Content Moderator API on the [Microsoft Azure portal](https:\/\/portal.azure.com\/#create\/Microsoft.CognitiveServices\/apitype\/ContentModerator).
1. Sign up for the content moderator review [tool](http:\/\/contentmoderator.cognitive.microsoft.com\/)
2. In settings->credential section you will see apiKey (Ocp-Apim-Subscription-Key)
 
  ## Custom datatypes: 
   |Datatype|Description|Example
   |--------|-----------|----------
   |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
   |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
   |List|Simple array|```["123", "sample"]``` 
   |Select|String with predefined values|```sample```
   |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ``` 
 
## MicrosoftContentModerator.evaluateImage
Returns probabilities of the image containing racy or adult content.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| cacheImage  | Select     | Whether to retain the submitted image for future use; defaults to false if omitted.
| imageUrl    | String     | Image url for scan.

## MicrosoftContentModerator.findFaces
Returns probabilities of the image containing faces.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| cacheImage  | Select     | Whether to retain the submitted image for future use; defaults to false if omitted.
| imageUrl    | String     | Image url for scan.

## MicrosoftContentModerator.getMatchImage
Fuzzily match an image against one of your custom Image Lists. You can create and manage your custom image lists using this API.Returns ID and tags of matching image.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The id of list.
| cacheImage  | Select     | Whether to retain the submitted image for future use; defaults to false if omitted.
| imageUrl    | String     | Image url for scan.

## MicrosoftContentModerator.getImageText
Returns any text found in the image for the language specified.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| cacheImage  | Select     | Whether to retain the submitted image for future use; defaults to false if omitted.
| imageUrl    | String     | Image url for scan.
| language    | String     | ISO 639-3 code.
| enhanced    | Select     | When set to True, the image goes through additional processing to come with additional candidates.Image/tiff is not supported when enhanced is set to true.Note: This impacts the response time.

## MicrosoftContentModerator.detectLanguage
This operation will detect the language of given input content. Returns the ISO 639-3 code for the predominant language comprising the submitted text. Over 110 languages supported.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| contentType | Select     | Media type of the body sent to the API.
| availableApi| Select     | The region that most closely describes your location.
| text        | String     | Text for scan.

## MicrosoftContentModerator.detectProfanityLanguage
The operation detects profanity in more than 100 languages and match against custom and shared blacklists.

| Field                          | Type       | Description
|--------------------------------|------------|----------
| apiKey                         | credentials| Your API Key.
| contentType                    | Select     | Media type of the body sent to the API.
| availableApi                   | Select     | The region that most closely describes your location.
| text                           | String     | Text for scan.
| language                       | String     | Optional parameter. If no language is specified, it would default to English.
| autocorrect                    | Select     | Runs auto correction on the input, before running other operations.
| personalIdentifiableInformation| Select     | Detects Personal Identifiable Information (PII) in the input.
| listId                         | String     | The list to be for matching.

## MicrosoftContentModerator.addImageInList
Add an Image to your image list. The image list can be used to do fuzzy matching against other images when using Image/Match API.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.
| tag         | Select     | The list to be for matching.
| label       | String     | Any additional information about the reference image.
| imageUrl    | String     | Image url for scan.

## MicrosoftContentModerator.deleteImageFromList
Delete an Image from your image list. The image list can be used to do fuzzy matching against other images when using Image/Match API.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.
| imageId     | String     | Id of image.

## MicrosoftContentModerator.deleteAllImagesFromList
Delete all images from your list. The image list can be used to do fuzzy matching against other images when using Image/Match API.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.

## MicrosoftContentModerator.getAllImagesFromList
Get all Image Ids from list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.

## MicrosoftContentModerator.getImageListDetails
Get all details about list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.

## MicrosoftContentModerator.createImageList
Create image list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| name        | String     | Name of list.
| description | String     | Description of list.
| metadata    | JSON       | Metadata of list.

## MicrosoftContentModerator.deleteImageList
Delete list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.

## MicrosoftContentModerator.getAllImageLists
Get All Lists.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.

## MicrosoftContentModerator.refreshImageSearchIndex
Refresh Search Index.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.

## MicrosoftContentModerator.updateImageList
Update image list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| name        | String     | Name of list.
| description | String     | Description of list.
| metadata    | JSON       | Metadata of list.

## MicrosoftContentModerator.addTerm
Add term in list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.
| term        | String     | Term name.
| language    | String     | Language code.

## MicrosoftContentModerator.deleteTerm
Delete term from list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.
| term        | String     | Term name.
| language    | String     | Language code.

## MicrosoftContentModerator.deleteAllTermsFromList
Delete All Terms From List.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.
| language    | String     | Language code.

## MicrosoftContentModerator.getAllTermsFromList
Delete All Terms From List.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.
| language    | String     | Language code.

## MicrosoftContentModerator.createTermList
Create term list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| name        | String     | Name of list.
| description | String     | Description of list.
| metadata    | JSON       | Metadata of list.

## MicrosoftContentModerator.deleteTermList
Delete All Terms From List.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.

## MicrosoftContentModerator.getAllTermLists
Get All Term Lists.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.

## MicrosoftContentModerator.getTermListDetails
Get Term List Details.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.

## MicrosoftContentModerator.refreshTermSearchIndex
Term Lists - Refresh Search Index.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| listId      | String     | The list to be for matching.
| language    | String     | Language code.

## MicrosoftContentModerator.updateTermList
Update term list.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API Key.
| availableApi| Select     | The region that most closely describes your location.
| name        | String     | Name of list.
| description | String     | Description of list.
| metadata    | JSON       | Metadata of list.
| listId      | String     | The list to be for matching.

