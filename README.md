added function in function.php child theme.

example of API

https://secure.p03.eloqua.com/Main.aspx#forms&id=380

POST https://secure.p03.eloqua.com/api/REST/2.0/data/form/380
Authorization: Basic T3ZlcmhlYWREb29yQ29ycG9yYXRpb25cRWxvcXVhLkFQSTpFbDBxdTQhQVAx
Content-Type: application/json
{
"id":"380",
"fieldValues": [
{
"type": "FieldValue",
"id": "4729",
"value": "firstName"
},
{
"type": "FieldValue",
"id": "4730",
"value": "lastName"
},
{
"type": "FieldValue",
"id": "4731",
"value": "email"
},
{
"type": "FieldValue",
"id": "4732",
"value": "comments"
}
]
}
