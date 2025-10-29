---
url: "https://docs.useplunk.com/api-reference/actions/track"
title: "Track event - Plunk"
---

[Skip to main content](https://docs.useplunk.com/api-reference/actions/track#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Automations

Track event

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Track event

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/track \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "event": "<string>",
  "email": "<string>",
  "subscribed": true,
  "data": {}
}'
```

Response

Copy

```
{
    "success": true,
    "contact": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",
    "event":  "541fb6c3-3299-429b-980d-82ca5907abeb",
    "timestamp": "1970-01-01T00:00:00.000Z"
}

```

Automations

# Track event

Track events in your applications and send them to Plunk

POST

/

v1

/

track

Try it

Track event

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/track \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "event": "<string>",
  "email": "<string>",
  "subscribed": true,
  "data": {}
}'
```

Response

Copy

```
{
    "success": true,
    "contact": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",
    "event":  "541fb6c3-3299-429b-980d-82ca5907abeb",
    "timestamp": "1970-01-01T00:00:00.000Z"
}

```

### [​](https://docs.useplunk.com/api-reference/actions/track\#body)  Body

[​](https://docs.useplunk.com/api-reference/actions/track#param-event)

event

string

required

The event you want to track

[​](https://docs.useplunk.com/api-reference/actions/track#param-email)

email

string

required

The email address

[​](https://docs.useplunk.com/api-reference/actions/track#param-subscribed)

subscribed

boolean

default:"true"

Should the contact be [subscribed](https://docs.useplunk.com/working-with-contacts/subscribe-state)

[​](https://docs.useplunk.com/api-reference/actions/track#param-data)

data

object

Metadata you want to attach to the contact.

### [​](https://docs.useplunk.com/api-reference/actions/track\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/actions/track#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/actions/track\#response)  Response

[​](https://docs.useplunk.com/api-reference/actions/track#param-success)

success

boolean

Indicates whether the call was successful.

[​](https://docs.useplunk.com/api-reference/actions/track#param-contact)

contact

string

The ID of the contact. If the contact already exists, the ID will be returned. If the contact is new, a new ID will be generated.

[​](https://docs.useplunk.com/api-reference/actions/track#param-event-1)

event

string

The ID of the event. If the event already exists, the ID will be returned. If the event is new, a new ID will be generated.

[​](https://docs.useplunk.com/api-reference/actions/track#param-timestamp)

timestamp

datetime

The timestamp of the event.

[Authentication](https://docs.useplunk.com/api-reference/authentication) [Send email](https://docs.useplunk.com/api-reference/transactional/send)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/authentication#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

API Documentation

Authentication

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

On this page

- [Public API Key](https://docs.useplunk.com/api-reference/authentication#public-api-key)
- [Secret API Key](https://docs.useplunk.com/api-reference/authentication#secret-api-key)

API Documentation

# Authentication

How to authenticate requests to the API

Each request to the API must be authenticated with a valid API token. You can find both your public and secret API key in the [API settings](https://app.useplunk.com/settings/api) of your project.

Copy

```
'Authorization': 'Bearer <team_token>'

```

## [​](https://docs.useplunk.com/api-reference/authentication\#public-api-key)  Public API Key

Your public API key should be used in environments like the browser or mobile apps.

| Action | Allowed |
| --- | --- |
| Tracking Events | ✔️ |
| Sending transactional emails | ✖ |
| Retrieving contacts | ✖ |
| Creating new contacts | ✖ |
| Deleting contacts | ✖ |

## [​](https://docs.useplunk.com/api-reference/authentication\#secret-api-key)  Secret API Key

Your secret API key should be used in environments like your backend server.

| Action | Allowed |
| --- | --- |
| Tracking Events | ✔️ |
| Sending transactional emails | ✔️ |
| Retrieving contacts | ✔️ |
| Creating new contacts | ✔️ |
| Deleting contacts | ✔️ |

[Base URL](https://docs.useplunk.com/api-reference/base-url) [Track event](https://docs.useplunk.com/api-reference/actions/track)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/base-url#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

API Documentation

Base URL

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

On this page

- [Plunk Hosted](https://docs.useplunk.com/api-reference/base-url#plunk-hosted)
- [Self-hosted](https://docs.useplunk.com/api-reference/base-url#self-hosted)

API Documentation

# Base URL

The base URL for all API requests

## [​](https://docs.useplunk.com/api-reference/base-url\#plunk-hosted)  Plunk Hosted

If you are using Plunk’s hosted service, you can make API requests to `https://api.useplunk.com`.

## [​](https://docs.useplunk.com/api-reference/base-url\#self-hosted)  Self-hosted

If you are self-hosting Plunk using the `driaug/plunk` Docker image, you can make API requests to the `/api` endpoint of your domain.For example, if you are hosting Plunk at `https://plunk.example.com`, you make API requests to `https://plunk.example.com/api`.

[Authentication](https://docs.useplunk.com/api-reference/authentication)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/campaigns/create#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Campaigns

Create a campaign

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Create a campaign

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/campaigns \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "subject": "<string>",
  "body": "<string>",
  "recipients": [\
    "<string>"\
  ],
  "style": "<string>"
}'
```

Response

Copy

```
{
  "id": "45fb8871-c028-414e-a351-ce7fafaf00f1",
  "subject": "My new campaign!",
  "body": "This is my Plunk campaign.",
  "status": "DRAFT",
  "delivered": null,
  "style": "PLUNK",
  "projectId": "191f2aab-224b-4a23-9772-3c536440af09",
  "createdAt": "2024-08-10T19:53:28.207Z",
  "updatedAt": "2024-08-10T19:53:28.207Z"
}

```

Campaigns

# Create a campaign

Create a new campaign

POST

/

v1

/

campaigns

Try it

Create a campaign

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/campaigns \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "subject": "<string>",
  "body": "<string>",
  "recipients": [\
    "<string>"\
  ],
  "style": "<string>"
}'
```

Response

Copy

```
{
  "id": "45fb8871-c028-414e-a351-ce7fafaf00f1",
  "subject": "My new campaign!",
  "body": "This is my Plunk campaign.",
  "status": "DRAFT",
  "delivered": null,
  "style": "PLUNK",
  "projectId": "191f2aab-224b-4a23-9772-3c536440af09",
  "createdAt": "2024-08-10T19:53:28.207Z",
  "updatedAt": "2024-08-10T19:53:28.207Z"
}

```

### [​](https://docs.useplunk.com/api-reference/campaigns/create\#body)  Body

[​](https://docs.useplunk.com/api-reference/campaigns/create#param-subject)

subject

string

required

The subject of the campaign

[​](https://docs.useplunk.com/api-reference/campaigns/create#param-body)

body

string

required

The body of the campaign

[​](https://docs.useplunk.com/api-reference/campaigns/create#param-recipients)

recipients

string\[\]

required

An array of contact IDs or emails to send the campaign to

[​](https://docs.useplunk.com/api-reference/campaigns/create#param-style)

style

string

default:"PLUNK"

Weather the campaign is a `PLUNK` template or `HTML` email

### [​](https://docs.useplunk.com/api-reference/campaigns/create\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/campaigns/create#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/campaigns/create\#reponse)  Reponse

[Send email](https://docs.useplunk.com/api-reference/transactional/send) [Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/campaigns/delete#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Campaigns

Delete a campaign

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Delete a campaign

cURL

Copy

```
curl --request DELETE \
  --url https://api.useplunk.com/v1/campaigns \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>"
}'
```

Response

Copy

```
{
  "id": "45fb8871-c028-414e-a351-ce7fafaf00f1",
  "subject": "My new campaign!",
  "body": "This is my Plunk campaign.",
  "status": "DRAFT",
  "delivered": null,
  "style": "PLUNK",
  "projectId": "191f2aab-224b-4a23-9772-3c536440af09",
  "createdAt": "2024-08-10T19:53:28.207Z",
  "updatedAt": "2024-08-10T19:53:28.207Z"
}

```

Campaigns

# Delete a campaign

Delete a campaign

DELETE

/

v1

/

campaigns

Try it

Delete a campaign

cURL

Copy

```
curl --request DELETE \
  --url https://api.useplunk.com/v1/campaigns \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>"
}'
```

Response

Copy

```
{
  "id": "45fb8871-c028-414e-a351-ce7fafaf00f1",
  "subject": "My new campaign!",
  "body": "This is my Plunk campaign.",
  "status": "DRAFT",
  "delivered": null,
  "style": "PLUNK",
  "projectId": "191f2aab-224b-4a23-9772-3c536440af09",
  "createdAt": "2024-08-10T19:53:28.207Z",
  "updatedAt": "2024-08-10T19:53:28.207Z"
}

```

### [​](https://docs.useplunk.com/api-reference/campaigns/delete\#body)  Body

[​](https://docs.useplunk.com/api-reference/campaigns/delete#param-id)

id

string

required

The ID of the campaign to delete

### [​](https://docs.useplunk.com/api-reference/campaigns/delete\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/campaigns/delete#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/campaigns/delete\#response)  Response

[Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update) [Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/campaigns/send#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Campaigns

Send a campaign

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Send a campaign

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/campaigns/send \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>",
  "live": true,
  "delay": 123
}'
```

Campaigns

# Send a campaign

Send a campaign

POST

/

v1

/

campaigns

/

send

Try it

Send a campaign

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/campaigns/send \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>",
  "live": true,
  "delay": 123
}'
```

[​](https://docs.useplunk.com/api-reference/campaigns/send#param-id)

id

string

required

The ID of the campaign to send

[​](https://docs.useplunk.com/api-reference/campaigns/send#param-live)

live

boolean

default:false

Should the campaign be sent to the recipients

[​](https://docs.useplunk.com/api-reference/campaigns/send#param-delay)

delay

number

The delay in minutes before sending the first email

### [​](https://docs.useplunk.com/api-reference/campaigns/send\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/campaigns/send#param-content-type)

Content-Type

string

required

`application/json`

[Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create) [Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/campaigns/update#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Campaigns

Update a campaign

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Update a campaign

cURL

Copy

```
curl --request PUT \
  --url https://api.useplunk.com/v1/campaigns \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>",
  "subject": "<string>",
  "body": "<string>",
  "recipients": [\
    "<string>"\
  ],
  "style": "<string>"
}'
```

Response

Copy

```
{
  "id": "45fb8871-c028-414e-a351-ce7fafaf00f1",
  "subject": "My new campaign!",
  "body": "This is my Plunk campaign.",
  "status": "DRAFT",
  "delivered": null,
  "style": "PLUNK",
  "projectId": "191f2aab-224b-4a23-9772-3c536440af09",
  "createdAt": "2024-08-10T19:53:28.207Z",
  "updatedAt": "2024-08-10T19:53:28.207Z"
}

```

Campaigns

# Update a campaign

Update an existing campaign

PUT

/

v1

/

campaigns

Try it

Update a campaign

cURL

Copy

```
curl --request PUT \
  --url https://api.useplunk.com/v1/campaigns \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>",
  "subject": "<string>",
  "body": "<string>",
  "recipients": [\
    "<string>"\
  ],
  "style": "<string>"
}'
```

Response

Copy

```
{
  "id": "45fb8871-c028-414e-a351-ce7fafaf00f1",
  "subject": "My new campaign!",
  "body": "This is my Plunk campaign.",
  "status": "DRAFT",
  "delivered": null,
  "style": "PLUNK",
  "projectId": "191f2aab-224b-4a23-9772-3c536440af09",
  "createdAt": "2024-08-10T19:53:28.207Z",
  "updatedAt": "2024-08-10T19:53:28.207Z"
}

```

### [​](https://docs.useplunk.com/api-reference/campaigns/update\#body)  Body

[​](https://docs.useplunk.com/api-reference/campaigns/update#param-id)

id

string

required

The ID of the campaign to update

[​](https://docs.useplunk.com/api-reference/campaigns/update#param-subject)

subject

string

required

The subject of the campaign

[​](https://docs.useplunk.com/api-reference/campaigns/update#param-body)

body

string

required

The body of the campaign

[​](https://docs.useplunk.com/api-reference/campaigns/update#param-recipients)

recipients

string\[\]

required

An array of contact IDs or emails to send the campaign to

[​](https://docs.useplunk.com/api-reference/campaigns/update#param-style)

style

string

default:"PLUNK"

Weather the campaign is a `PLUNK` template or `HTML` email

### [​](https://docs.useplunk.com/api-reference/campaigns/update\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/campaigns/update#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/campaigns/update\#response)  Response

[Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send) [Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/contacts/count#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Contacts

Get # of contacts

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Get # of contacts

cURL

Copy

```
curl --request GET \
  --url https://api.useplunk.com/v1/contacts/count \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>'
```

Response

Copy

```
{
    "count": 100
}

```

Contacts

# Get \# of contacts

Get the number of contacts in your project

GET

/

v1

/

contacts

/

count

Try it

Get # of contacts

cURL

Copy

```
curl --request GET \
  --url https://api.useplunk.com/v1/contacts/count \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>'
```

Response

Copy

```
{
    "count": 100
}

```

### [​](https://docs.useplunk.com/api-reference/contacts/count\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/contacts/count#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/contacts/count\#response)  Response

[​](https://docs.useplunk.com/api-reference/contacts/count#param-count)

count

integer

The number of contacts in your project.

[Get all contacts](https://docs.useplunk.com/api-reference/contacts/get) [Create a contact](https://docs.useplunk.com/api-reference/contacts/create)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/contacts/create#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Contacts

Create a contact

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Create a contact

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/contacts \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "email": "<string>",
  "subscribed": true,
  "data": {}
}'
```

Response

Copy

```
{
    "success": true,
    "id": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",
    "email": "hello@useplunk.com",
    "subscribed": true,
    "data": {
        "project": "Plunk"
    },
    "createdAt": "2021-01-01T00:00:00.000Z",
    "updatedAt": "2021-01-01T00:00:00.000Z"
}

```

Contacts

# Create a contact

Create a new contact

POST

/

v1

/

contacts

Try it

Create a contact

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/contacts \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "email": "<string>",
  "subscribed": true,
  "data": {}
}'
```

Response

Copy

```
{
    "success": true,
    "id": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",
    "email": "hello@useplunk.com",
    "subscribed": true,
    "data": {
        "project": "Plunk"
    },
    "createdAt": "2021-01-01T00:00:00.000Z",
    "updatedAt": "2021-01-01T00:00:00.000Z"
}

```

In most cases, it is recommended to use the [track](https://docs.useplunk.com/api-reference/actions/track) endpoint to create a contact.
When a new contact tracks an event Plunk will automatically create the contact, thus saving you an API call.

### [​](https://docs.useplunk.com/api-reference/contacts/create\#body)  Body

[​](https://docs.useplunk.com/api-reference/contacts/create#param-email)

email

string

required

The email address of the contact.

[​](https://docs.useplunk.com/api-reference/contacts/create#param-subscribed)

subscribed

boolean

required

Whether the contact is subscribed to marketing emails.

[​](https://docs.useplunk.com/api-reference/contacts/create#param-data)

data

object

Metadata to store with the contact.

### [​](https://docs.useplunk.com/api-reference/contacts/create\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/contacts/create#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/contacts/create\#response)  Response

[Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count) [Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/contacts/delete#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Contacts

Delete a contact

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Delete a contact

cURL

Copy

```
curl --request DELETE \
  --url https://api.useplunk.com/v1/contacts \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>"
}'
```

Response

Copy

```
{
    "success": true,
    "id": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",
    "email": "hello@useplunk.com",
    "subscribed": true,
    "data": {
        "project": "Plunk"
    },
    "createdAt": "2021-01-01T00:00:00.000Z",
    "updatedAt": "2021-01-01T00:00:00.000Z"
}

```

Contacts

# Delete a contact

Delete a contact by ID

DELETE

/

v1

/

contacts

Try it

Delete a contact

cURL

Copy

```
curl --request DELETE \
  --url https://api.useplunk.com/v1/contacts \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "id": "<string>"
}'
```

Response

Copy

```
{
    "success": true,
    "id": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",
    "email": "hello@useplunk.com",
    "subscribed": true,
    "data": {
        "project": "Plunk"
    },
    "createdAt": "2021-01-01T00:00:00.000Z",
    "updatedAt": "2021-01-01T00:00:00.000Z"
}

```

### [​](https://docs.useplunk.com/api-reference/contacts/delete\#body)  Body

[​](https://docs.useplunk.com/api-reference/contacts/delete#param-id)

id

string

required

The ID of the contact you want to delete.

### [​](https://docs.useplunk.com/api-reference/contacts/delete\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/contacts/delete#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/contacts/delete\#response)  Response

[Update a contact](https://docs.useplunk.com/api-reference/contacts/put)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/contacts/get#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Contacts

Get all contacts

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Get all contacts

cURL

Copy

```
curl --request GET \
  --url https://api.useplunk.com/v1/contacts \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>'
```

Contacts

# Get all contacts

Get all contacts in your project

GET

/

v1

/

contacts

Try it

Get all contacts

cURL

Copy

```
curl --request GET \
  --url https://api.useplunk.com/v1/contacts \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>'
```

### [​](https://docs.useplunk.com/api-reference/contacts/get\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/contacts/get#param-content-type)

Content-Type

string

required

`application/json`

[Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id) [Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/contacts/id#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Contacts

Get contact by ID

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Get contact by ID

cURL

Copy

```
curl --request GET \
  --url https://api.useplunk.com/v1/contacts/:id \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>'
```

Contacts

# Get contact by ID

Get a specific contact

GET

/

v1

/

contacts

/

:id

Try it

Get contact by ID

cURL

Copy

```
curl --request GET \
  --url https://api.useplunk.com/v1/contacts/:id \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>'
```

### [​](https://docs.useplunk.com/api-reference/contacts/id\#path)  Path

[​](https://docs.useplunk.com/api-reference/contacts/id#param-id)

id

string

required

The ID of the contact you want to get.

### [​](https://docs.useplunk.com/api-reference/contacts/id\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/contacts/id#param-content-type)

Content-Type

string

required

`application/json`

[Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete) [Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/api-reference/transactional/send#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Transactional

Send email

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### API Documentation

- [Base URL](https://docs.useplunk.com/api-reference/base-url)
- [Authentication](https://docs.useplunk.com/api-reference/authentication)

##### Automations

- [POST\\
\\
Track event](https://docs.useplunk.com/api-reference/actions/track)

##### Transactional

- [POST\\
\\
Send email](https://docs.useplunk.com/api-reference/transactional/send)

##### Campaigns

- [POST\\
\\
Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)
- [POST\\
\\
Send a campaign](https://docs.useplunk.com/api-reference/campaigns/send)
- [PUT\\
\\
Update a campaign](https://docs.useplunk.com/api-reference/campaigns/update)
- [DEL\\
\\
Delete a campaign](https://docs.useplunk.com/api-reference/campaigns/delete)

##### Contacts

- [GET\\
\\
Get contact by ID](https://docs.useplunk.com/api-reference/contacts/id)
- [GET\\
\\
Get all contacts](https://docs.useplunk.com/api-reference/contacts/get)
- [GET\\
\\
Get # of contacts](https://docs.useplunk.com/api-reference/contacts/count)
- [POST\\
\\
Create a contact](https://docs.useplunk.com/api-reference/contacts/create)
- [POST\\
\\
Subscribe contact](https://docs.useplunk.com/api-reference/contacts/subscribe)
- [POST\\
\\
Unsubscribe contact](https://docs.useplunk.com/api-reference/contacts/unsubscribe)
- [PUT\\
\\
Update a contact](https://docs.useplunk.com/api-reference/contacts/put)
- [DEL\\
\\
Delete a contact](https://docs.useplunk.com/api-reference/contacts/delete)

Send email

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/send \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "to": "<string>",
  "subject": "<string>",
  "body": "<string>",
  "subscribed": true,
  "name": "<string>",
  "from": "<string>",
  "reply": "<string>",
  "headers": {},
  "attachments": {}
}'
```

Response

Copy

```
{
  "success": true,
  "emails": [\
    {\
      "contact": {\
        "id": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",\
        "email": "hello@useplunk.com"\
      },\
      "email": "ebd44b76-9e1d-4826-96a1-9a240c42a939"\
    },\
    {\
      "contact": {\
        "id": "8f33fe24a-1ce7-4498-8769-f80d67b4e59d",\
        "email":  "billing@useplunk.com"\
      },\
      "email": "bd2d0ece-7a4e-48b8-a8be-be5af077adc1"\
    }\
  ],
  "timestamp": "1970-01-01T00:00:00.000Z"
}

```

Transactional

# Send email

Send emails with a single API call.

POST

/

v1

/

send

Try it

Send email

cURL

Copy

```
curl --request POST \
  --url https://api.useplunk.com/v1/send \
  --header 'Authorization: Bearer <token>' \
  --header 'Content-Type: <content-type>' \
  --data '{
  "to": "<string>",
  "subject": "<string>",
  "body": "<string>",
  "subscribed": true,
  "name": "<string>",
  "from": "<string>",
  "reply": "<string>",
  "headers": {},
  "attachments": {}
}'
```

Response

Copy

```
{
  "success": true,
  "emails": [\
    {\
      "contact": {\
        "id": "80d74d13-16eb-48c5-bc2b-aae6fd5865cc",\
        "email": "hello@useplunk.com"\
      },\
      "email": "ebd44b76-9e1d-4826-96a1-9a240c42a939"\
    },\
    {\
      "contact": {\
        "id": "8f33fe24a-1ce7-4498-8769-f80d67b4e59d",\
        "email":  "billing@useplunk.com"\
      },\
      "email": "bd2d0ece-7a4e-48b8-a8be-be5af077adc1"\
    }\
  ],
  "timestamp": "1970-01-01T00:00:00.000Z"
}

```

### [​](https://docs.useplunk.com/api-reference/transactional/send\#body)  Body

[​](https://docs.useplunk.com/api-reference/transactional/send#param-to)

to

string

required

A single email address or an array of email addresses.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-subject)

subject

string

required

The subject of the email.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-body)

body

string

required

The body of the email.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-subscribed)

subscribed

boolean

default:"false"

Should the contact be [subscribed](https://docs.useplunk.com/working-with-contacts/subscribe-state)

[​](https://docs.useplunk.com/api-reference/transactional/send#param-name)

name

string

Override the name of the sender. Defaults to the project name.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-from)

from

string

Override the email of the sender. Defaults to your verified email.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-reply)

reply

string

Override the reply-to address. Defaults to the from address or your verified email if the from address is not set.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-headers)

headers

object

Additional headers to include in the email.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-attachments)

attachments

object

Up to 5 file attachments

### [​](https://docs.useplunk.com/api-reference/transactional/send\#headers)  Headers

[​](https://docs.useplunk.com/api-reference/transactional/send#param-content-type)

Content-Type

string

required

`application/json`

### [​](https://docs.useplunk.com/api-reference/transactional/send\#response)  Response

[​](https://docs.useplunk.com/api-reference/transactional/send#param-success)

success

boolean

Indicates whether the call was successful.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-emails)

emails

Email Object

Show properties

Show Contact

[​](https://docs.useplunk.com/api-reference/transactional/send#param-id)

id

string

The ID of the contact. If the contact already exists, the ID will be returned. If the contact is new, a new ID will be generated.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-email)

email

string

The email of the contact.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-email-1)

email

string

The ID of the email.

[​](https://docs.useplunk.com/api-reference/transactional/send#param-timestamp)

timestamp

datetime

The timestamp of the event.

[Track event](https://docs.useplunk.com/api-reference/actions/track) [Create a campaign](https://docs.useplunk.com/api-reference/campaigns/create)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/getting-started/introduction#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Get Started

Introduction

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### Get Started

- [Introduction](https://docs.useplunk.com/getting-started/introduction)
- [Overview](https://docs.useplunk.com/getting-started/overview)
- [SMTP](https://docs.useplunk.com/getting-started/smtp)
- [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

##### Guides

- [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)
- [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)
- [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)
- [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

##### Tools

- [Using React Email](https://docs.useplunk.com/guides/react-email)
- [Using JSX Email](https://docs.useplunk.com/guides/jsx-email)
- [Using Nodemailer](https://docs.useplunk.com/guides/nodemailer)
- [Using Rust SDK](https://docs.useplunk.com/guides/rust-sdk)

##### Configuration

- [Custom domain](https://docs.useplunk.com/configuration/domain)
- [Importing Contacts](https://docs.useplunk.com/configuration/importing-contacts)

##### Working with contacts

- [Metadata](https://docs.useplunk.com/working-with-contacts/metadata)
- [Segmentation](https://docs.useplunk.com/working-with-contacts/segmentation)
- [Subscriptions](https://docs.useplunk.com/working-with-contacts/subscribe-state)

Get Started

# Introduction

Plunk, The Open-Source Email Platform for AWS

[**Set up an email automation** \\
\\
Learn how track events and set up an action](https://docs.useplunk.com/guides/setting-up-automation) [**Transactional Emails** \\
\\
Start sending emails with a single API call](https://docs.useplunk.com/api-reference/transactional) [**Custom domain** \\
\\
Verify your domain and use it to send emails](https://docs.useplunk.com/configuration/domain) [**Self-Hosting Plunk** \\
\\
Learn how to self-host Plunk](https://docs.useplunk.com/getting-started/self-hosting)

[Overview](https://docs.useplunk.com/getting-started/overview)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/getting-started/overview#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Get Started

Overview

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### Get Started

- [Introduction](https://docs.useplunk.com/getting-started/introduction)
- [Overview](https://docs.useplunk.com/getting-started/overview)
- [SMTP](https://docs.useplunk.com/getting-started/smtp)
- [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

##### Guides

- [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)
- [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)
- [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)
- [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

##### Tools

- [Using React Email](https://docs.useplunk.com/guides/react-email)
- [Using JSX Email](https://docs.useplunk.com/guides/jsx-email)
- [Using Nodemailer](https://docs.useplunk.com/guides/nodemailer)
- [Using Rust SDK](https://docs.useplunk.com/guides/rust-sdk)

##### Configuration

- [Custom domain](https://docs.useplunk.com/configuration/domain)
- [Importing Contacts](https://docs.useplunk.com/configuration/importing-contacts)

##### Working with contacts

- [Metadata](https://docs.useplunk.com/working-with-contacts/metadata)
- [Segmentation](https://docs.useplunk.com/working-with-contacts/segmentation)
- [Subscriptions](https://docs.useplunk.com/working-with-contacts/subscribe-state)

On this page

- [Actions](https://docs.useplunk.com/getting-started/overview#actions)
- [Transactional Emails](https://docs.useplunk.com/getting-started/overview#transactional-emails)
- [Campaigns](https://docs.useplunk.com/getting-started/overview#campaigns)

Get Started

# Overview

Discover the core concepts of Plunk

Plunk is the open-source email platform for AWS. It brings together all aspects of email into one place, so you can focus on building your product.Whenever you track an event or send an email to a user, Plunk will automatically create a contact. This contact contains all the information you need, including the user’s email address and any [metadata you have added](https://docs.useplunk.com/working-with-contacts/metadata).
A contact in Plunk is shared across all types of emails, so you can use the same contact for transactional emails, campaigns, and automations. This gives you a single pane of glass to view all of your user’s email activity.

## [​](https://docs.useplunk.com/getting-started/overview\#actions)  Actions

Actions, often called automations, are repeatable email sequences that are triggered by a user event. For example, a welcome email when a user signs up, or a reminder email when a user abandons their cart.Actions offer you a few configuration options that allow you to customize them to your needs. This includes:

- Being able to delay the email, for example, send the welcome email 1 hour after the user signs up.
- Being able to exclude users from receiving the email, for example, exclude users who already have a subscription.

Setting up an action is easy. You can find how to do so in the [guide](https://docs.useplunk.com/guides/setting-up-automation).

## [​](https://docs.useplunk.com/getting-started/overview\#transactional-emails)  Transactional Emails

Sometimes you don’t want to set up an entire automation, but instead, want to quickly send an email to a user.
This is where transactional emails come in. They allow you to email your users with a single API call.

## [​](https://docs.useplunk.com/getting-started/overview\#campaigns)  Campaigns

Once you have collected some contacts, you can start sending them campaigns. A campaign is a one-off email that you send to a group of contacts. For example, newsletters, product updates, or announcements.
Using the [metadata you have added](https://docs.useplunk.com/working-with-contacts/metadata) to your contacts, you can segment your contacts into lists, making it easy to send a campaign to a specific group of users.

[Introduction](https://docs.useplunk.com/getting-started/introduction) [SMTP](https://docs.useplunk.com/getting-started/smtp)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/getting-started/self-hosting#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Get Started

Self-hosting Plunk

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### Get Started

- [Introduction](https://docs.useplunk.com/getting-started/introduction)
- [Overview](https://docs.useplunk.com/getting-started/overview)
- [SMTP](https://docs.useplunk.com/getting-started/smtp)
- [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

##### Guides

- [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)
- [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)
- [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)
- [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

##### Tools

- [Using React Email](https://docs.useplunk.com/guides/react-email)
- [Using JSX Email](https://docs.useplunk.com/guides/jsx-email)
- [Using Nodemailer](https://docs.useplunk.com/guides/nodemailer)
- [Using Rust SDK](https://docs.useplunk.com/guides/rust-sdk)

##### Configuration

- [Custom domain](https://docs.useplunk.com/configuration/domain)
- [Importing Contacts](https://docs.useplunk.com/configuration/importing-contacts)

##### Working with contacts

- [Metadata](https://docs.useplunk.com/working-with-contacts/metadata)
- [Segmentation](https://docs.useplunk.com/working-with-contacts/segmentation)
- [Subscriptions](https://docs.useplunk.com/working-with-contacts/subscribe-state)

On this page

- [Prerequisites](https://docs.useplunk.com/getting-started/self-hosting#prerequisites)
- [Limitations](https://docs.useplunk.com/getting-started/self-hosting#limitations)
- [Self-hosting](https://docs.useplunk.com/getting-started/self-hosting#self-hosting)
- [1\. Configuring AWS](https://docs.useplunk.com/getting-started/self-hosting#1-configuring-aws)
- [1.1 SNS Topic](https://docs.useplunk.com/getting-started/self-hosting#1-1-sns-topic)
- [1.2 Configuration Set](https://docs.useplunk.com/getting-started/self-hosting#1-2-configuration-set)
- [1.3 AWS Credentials](https://docs.useplunk.com/getting-started/self-hosting#1-3-aws-credentials)
- [2\. Docker Compose](https://docs.useplunk.com/getting-started/self-hosting#2-docker-compose)
- [3\. Running Plunk](https://docs.useplunk.com/getting-started/self-hosting#3-running-plunk)
- [3.1 Creating a subscription to SNS](https://docs.useplunk.com/getting-started/self-hosting#3-1-creating-a-subscription-to-sns)
- [3.2 Confirming the subscription](https://docs.useplunk.com/getting-started/self-hosting#3-2-confirming-the-subscription)

Get Started

# Self-hosting Plunk

Learn how to self-host Plunk on your own infrastructure

## [​](https://docs.useplunk.com/getting-started/self-hosting\#prerequisites)  Prerequisites

Plunk is built on top of [AWS SES](https://aws.amazon.com/ses/). You will need an active AWS account with SES enabled to self-host it.

## [​](https://docs.useplunk.com/getting-started/self-hosting\#limitations)  Limitations

- Plunk is designed to run in a single AWS region. If you need to run Plunk in multiple regions, you will need to deploy multiple instances.

## [​](https://docs.useplunk.com/getting-started/self-hosting\#self-hosting)  Self-hosting

### [​](https://docs.useplunk.com/getting-started/self-hosting\#1-configuring-aws)  1\. Configuring AWS

To provide the feedback loop (delivery, bounce, and complaint notifications) an SNS topic and configuration set are required.

#### [​](https://docs.useplunk.com/getting-started/self-hosting\#1-1-sns-topic)  1.1 SNS Topic

Head over to the [SNS console](https://console.aws.amazon.com/sns/v3/home) and create a new Standard topic.![SNS Topic](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-topic.png)

#### [​](https://docs.useplunk.com/getting-started/self-hosting\#1-2-configuration-set)  1.2 Configuration Set

Head over to the [SES console](https://console.aws.amazon.com/ses/home) and create a new configuration set.
The name of this configuration set will be used as the value for the `AWS_SES_CONFIGURATION_SET` environment variable.![Configuration Set](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/ses-configuration-set.png)Add a new event destination to the configuration set. The event destination should be the SNS topic created in the previous step.Plunk can track the following events:

- Sends
- Deliveries
- Hard bounces
- Complaints
- Opens
- Clicks

![Events](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/ses-events.png)For the final step, link the configuration set to your SNS topic.![Event Destination](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/ses-event-destination.png)

#### [​](https://docs.useplunk.com/getting-started/self-hosting\#1-3-aws-credentials)  1.3 AWS Credentials

Plunk requires an `ACCESS_KEY_ID` and `SECRET_ACCESS_KEY` to interact with the AWS API. These credentials should be added to the environment variables.We recommend creating a new security policy with the following permissions

Copy

```
{
	"Version": "2012-10-17",
	"Statement": [\
		{\
			"Sid": "VisualEditor0",\
			"Effect": "Allow",\
			"Action": [\
				"ses:SetIdentityMailFromDomain",\
				"ses:GetIdentityDkimAttributes",\
				"ses:SendRawEmail",\
				"ses:GetIdentityVerificationAttributes",\
				"ses:VerifyDomainDkim",\
				"ses:ListIdentities",\
				"ses:SetIdentityFeedbackForwardingEnabled"\
			],\
			"Resource": "*"\
		}\
	]
}

```

This policy can be attached to a new IAM user with their own access key and secret.

Do not use your root account credentials. Create a new IAM user with the required permissions.

### [​](https://docs.useplunk.com/getting-started/self-hosting\#2-docker-compose)  2\. Docker Compose

Plunk is available as a Docker image on [Docker Hub](https://hub.docker.com/r/driaug/plunk).Since Plunk relies on a PostgreSQL database and Redis cache, the easiest way to get started is to use the following Docker Compose setup.These environment variables were created in the previous step:

- `AWS_REGION`: The region where your AWS account and services are located
- `AWS_ACCESS_KEY_ID`: The AWS access key ID
- `AWS_SECRET_ACCESS_KEY`: The AWS secret access key
- `AWS_SES_CONFIGURATION_SET`: The name of the SES configuration set

These environment variables need to be added:

- `JWT_SECRET`: A secret key used to sign JWT tokens
- `APP_URI`: The domain where you will be hosting Plunk
- `API_URI`: The domain where you will be hosting the API, this is should be your `APP_URI` with `/api` appended to it

Optional Enviroment variables that could be added:

- `DISABLE_SIGNUPS`: Deactivates the account creation process. Default is False.

Copy

```
version: '3'
services:
  plunk:
    image: "driaug/plunk"
    ports:
      - "3000:3000"
    depends_on:
      db:
        condition: service_healthy
      redis:
        condition: service_started
    environment:
      REDIS_URL: '${REDIS_URL:-redis://redis:6379}'
      DATABASE_URL: '${DATABASE_URL:-postgresql://postgres:postgres@db:5432/postgres}'
      JWT_SECRET: '${JWT_SECRET}'
      AWS_REGION: '${AWS_REGION}'
      AWS_ACCESS_KEY_ID: '${AWS_ACCESS_KEY_ID}'
      AWS_SECRET_ACCESS_KEY: '${AWS_SECRET_ACCESS_KEY}'
      AWS_SES_CONFIGURATION_SET: '${AWS_SES_CONFIGURATION_SET}'
      NEXT_PUBLIC_API_URI: '${API_URI}'
      API_URI: '${API_URI}'
      APP_URI: '${APP_URI}'
      DISABLE_SIGNUPS: 'False'
    entrypoint: [ "/app/entry.sh" ]
  db:
    image: postgres
    environment:
      POSTGRES_PASSWORD: postgres
      POSTGRES_USER: postgres
      POSTGRES_DB: postgres
    volumes:
      - postgres_data:/var/lib/postgresql/data
    healthcheck:
      test: [ "CMD-SHELL", "pg_isready -U postgres -d postgres" ]
      interval: 10s
      retries: 5
      timeout: 10s
  redis:
    image: redis

volumes:
  postgres_data:

```

### [​](https://docs.useplunk.com/getting-started/self-hosting\#3-running-plunk)  3\. Running Plunk

#### [​](https://docs.useplunk.com/getting-started/self-hosting\#3-1-creating-a-subscription-to-sns)  3.1 Creating a subscription to SNS

Before an SNS topic can be used, a subscription must be created an confirmed.Head to the [SNS console](https://console.aws.amazon.com/sns/v3/home) and find the SNS topic you created. Plunk requires an HTTPS subscription to the topic on the `/api/webhooks/incoming/sns` endpoint.

Replace `https://plunk.example.com` with the domain where you are hosting Plunk.

![SNS Subscription](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-subscription.png)

#### [​](https://docs.useplunk.com/getting-started/self-hosting\#3-2-confirming-the-subscription)  3.2 Confirming the subscription

Head to the [SNS console](https://console.aws.amazon.com/sns/v3/home) and select the subscription created in step 3.1.Select the subscription and click on `Request confirmation`.AWS will send a mock HTTP POST request to the endpoint. Plunk cannot automatically confirm the subscription, you will need to manually confirm it.![SNS Confirmation](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-confirm.png)Plunk will recognize that you want to confirm the subscription and show you the URL to confirm it.
![Plunk Confirmation](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-confirm-plunk.png)

[SMTP](https://docs.useplunk.com/getting-started/smtp) [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.

![SNS Topic](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-topic.png)

![Configuration Set](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/ses-configuration-set.png)

![Events](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/ses-events.png)

![Event Destination](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/ses-event-destination.png)

![SNS Subscription](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-subscription.png)

![SNS Confirmation](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-confirm.png)

![Plunk Confirmation](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/self-host/sns-confirm-plunk.png)



[Skip to main content](https://docs.useplunk.com/getting-started/smtp#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Get Started

SMTP

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### Get Started

- [Introduction](https://docs.useplunk.com/getting-started/introduction)
- [Overview](https://docs.useplunk.com/getting-started/overview)
- [SMTP](https://docs.useplunk.com/getting-started/smtp)
- [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

##### Guides

- [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)
- [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)
- [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)
- [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

##### Tools

- [Using React Email](https://docs.useplunk.com/guides/react-email)
- [Using JSX Email](https://docs.useplunk.com/guides/jsx-email)
- [Using Nodemailer](https://docs.useplunk.com/guides/nodemailer)
- [Using Rust SDK](https://docs.useplunk.com/guides/rust-sdk)

##### Configuration

- [Custom domain](https://docs.useplunk.com/configuration/domain)
- [Importing Contacts](https://docs.useplunk.com/configuration/importing-contacts)

##### Working with contacts

- [Metadata](https://docs.useplunk.com/working-with-contacts/metadata)
- [Segmentation](https://docs.useplunk.com/working-with-contacts/segmentation)
- [Subscriptions](https://docs.useplunk.com/working-with-contacts/subscribe-state)

On this page

- [Connecting to Plunk via SMTP](https://docs.useplunk.com/getting-started/smtp#connecting-to-plunk-via-smtp)

Get Started

# SMTP

Learn how to send emails via SMTP with Plunk

## [​](https://docs.useplunk.com/getting-started/smtp\#connecting-to-plunk-via-smtp)  Connecting to Plunk via SMTP

- **Host**: `smtp.useplunk.com`
- **Port**: `465` (or `587` for TLS)
- **Username**: `plunk`
- **Password**: Your Secret API Key

[Overview](https://docs.useplunk.com/getting-started/overview) [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/guides/send-a-transactional-email#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Guides

Send a transactional email

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### Get Started

- [Introduction](https://docs.useplunk.com/getting-started/introduction)
- [Overview](https://docs.useplunk.com/getting-started/overview)
- [SMTP](https://docs.useplunk.com/getting-started/smtp)
- [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

##### Guides

- [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)
- [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)
- [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)
- [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

##### Tools

- [Using React Email](https://docs.useplunk.com/guides/react-email)
- [Using JSX Email](https://docs.useplunk.com/guides/jsx-email)
- [Using Nodemailer](https://docs.useplunk.com/guides/nodemailer)
- [Using Rust SDK](https://docs.useplunk.com/guides/rust-sdk)

##### Configuration

- [Custom domain](https://docs.useplunk.com/configuration/domain)
- [Importing Contacts](https://docs.useplunk.com/configuration/importing-contacts)

##### Working with contacts

- [Metadata](https://docs.useplunk.com/working-with-contacts/metadata)
- [Segmentation](https://docs.useplunk.com/working-with-contacts/segmentation)
- [Subscriptions](https://docs.useplunk.com/working-with-contacts/subscribe-state)

On this page

- [Prerequisites](https://docs.useplunk.com/guides/send-a-transactional-email#prerequisites)
- [Sending an email](https://docs.useplunk.com/guides/send-a-transactional-email#sending-an-email)

Guides

# Send a transactional email

Learn how to send your first transactional email with Plunk

Transactional emails are most often a one-to-one communication between your application and your users. They are triggered by a user action, such as a password reset or a purchase confirmation.

## [​](https://docs.useplunk.com/guides/send-a-transactional-email\#prerequisites)  Prerequisites

- A Plunk account
- A secret key from the Plunk dashboard

## [​](https://docs.useplunk.com/guides/send-a-transactional-email\#sending-an-email)  Sending an email

Sending a transactional email only requires a single API call with 3 parameters: `to`, `subject`, and `body`.

- `to`: A single email address or an array of email addresses.
- `subject`: The subject of the email.
- `body`: The body of the email. This can be plain text or HTML.

Copy

```
await fetch('https://api.useplunk.com/v1/send', {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer <API_KEY>"
    },
    body: JSON.stringify({
        "to": "hello@useplunk.com",
        "subject": "Hello world!",
        "body": "Your first email with Plunk"
    })
});

```

[Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation) [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Guides

Send a transactional email with attachments

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### Get Started

- [Introduction](https://docs.useplunk.com/getting-started/introduction)
- [Overview](https://docs.useplunk.com/getting-started/overview)
- [SMTP](https://docs.useplunk.com/getting-started/smtp)
- [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

##### Guides

- [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)
- [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)
- [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)
- [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

##### Tools

- [Using React Email](https://docs.useplunk.com/guides/react-email)
- [Using JSX Email](https://docs.useplunk.com/guides/jsx-email)
- [Using Nodemailer](https://docs.useplunk.com/guides/nodemailer)
- [Using Rust SDK](https://docs.useplunk.com/guides/rust-sdk)

##### Configuration

- [Custom domain](https://docs.useplunk.com/configuration/domain)
- [Importing Contacts](https://docs.useplunk.com/configuration/importing-contacts)

##### Working with contacts

- [Metadata](https://docs.useplunk.com/working-with-contacts/metadata)
- [Segmentation](https://docs.useplunk.com/working-with-contacts/segmentation)
- [Subscriptions](https://docs.useplunk.com/working-with-contacts/subscribe-state)

On this page

- [Prerequisites](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments#prerequisites)
- [Sending an email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments#sending-an-email-with-attachments)
- [Example](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments#example)

Guides

# Send a transactional email with attachments

Learn how to send a transactional email with attachments

You can send transactional emails with one or more attachments using the Plunk API. This is useful for delivering files such as invoices, reports, or other documents directly to your users in response to their actions.

## [​](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments\#prerequisites)  Prerequisites

- A Plunk account
- A secret key from the Plunk dashboard

## [​](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments\#sending-an-email-with-attachments)  Sending an email with attachments

Sending a transactional email with attachments requires a single API call with the following parameters: `to`, `subject`, `body`, and optionally `attachments`.

- `to`: A single email address or an array of email addresses.
- `subject`: The subject of the email.
- `body`: The body of the email. This can be plain text or HTML.
- `attachments`: An array of up to 5 attachment objects. Each object must contain:

  - `filename`: The name of the file as it will appear in the email.
  - `content`: The file content, base64 encoded.
  - `contentType`: The MIME type of the file (e.g., `application/pdf`, `image/png`).

### [​](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments\#example)  Example

Copy

```
await fetch('https://api.useplunk.com/v1/send', {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer <API_KEY>"
    },
    body: JSON.stringify({
        "to": "hello@useplunk.com",
        "subject": "Hello with attachment!",
        "body": "Please find the attached file.",
        "attachments": [\
            {\
                "filename": "document.pdf",\
                "content": "<BASE64_ENCODED_CONTENT>",\
                "contentType": "application/pdf"\
            }\
        ]
    })
});

```

> **Note:** You can include up to 5 attachments per email. The `content` field must be base64 encoded.

[Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email) [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.



[Skip to main content](https://docs.useplunk.com/guides/setting-up-automation#content-area)

[Plunk home page![light logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-light.svg)![dark logo](https://mintlify.s3.us-west-1.amazonaws.com/plunk/logo/plunk-dark.svg)](https://docs.useplunk.com/)

Search...

Ctrl K

Search...

Navigation

Guides

Setting up an automation

[Documentation](https://docs.useplunk.com/getting-started/introduction) [API Reference](https://docs.useplunk.com/api-reference/base-url)

- [Community](https://useplunk.com/discord)

##### Get Started

- [Introduction](https://docs.useplunk.com/getting-started/introduction)
- [Overview](https://docs.useplunk.com/getting-started/overview)
- [SMTP](https://docs.useplunk.com/getting-started/smtp)
- [Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting)

##### Guides

- [Setting up an automation](https://docs.useplunk.com/guides/setting-up-automation)
- [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)
- [Send a transactional email with attachments](https://docs.useplunk.com/guides/send-a-transactional-email-with-attachments)
- [Setting up double opt-in](https://docs.useplunk.com/guides/double-opt-in)

##### Tools

- [Using React Email](https://docs.useplunk.com/guides/react-email)
- [Using JSX Email](https://docs.useplunk.com/guides/jsx-email)
- [Using Nodemailer](https://docs.useplunk.com/guides/nodemailer)
- [Using Rust SDK](https://docs.useplunk.com/guides/rust-sdk)

##### Configuration

- [Custom domain](https://docs.useplunk.com/configuration/domain)
- [Importing Contacts](https://docs.useplunk.com/configuration/importing-contacts)

##### Working with contacts

- [Metadata](https://docs.useplunk.com/working-with-contacts/metadata)
- [Segmentation](https://docs.useplunk.com/working-with-contacts/segmentation)
- [Subscriptions](https://docs.useplunk.com/working-with-contacts/subscribe-state)

On this page

- [Tracking events](https://docs.useplunk.com/guides/setting-up-automation#tracking-events)
- [Creating a template](https://docs.useplunk.com/guides/setting-up-automation#creating-a-template)
- [Setting up an action](https://docs.useplunk.com/guides/setting-up-automation#setting-up-an-action)

Guides

# Setting up an automation

Learn how to set up an automated email flow with Plunk

Automations are the bread and butter of Plunk. They allow you to set up a flow of emails that are sent to your users based on their actions. You might want to send a welcome email to new users and ask them for feedback a couple of days later.

## [​](https://docs.useplunk.com/guides/setting-up-automation\#tracking-events)  Tracking events

Events are the actions that your users take on your website or app. You track events by calling the [Plunk API](https://docs.useplunk.com/api-reference/actions/track).An example of an event is `new-project`, which you might want to track when a user creates a new project. You would send it to Plunk like this:

Copy

```
await fetch('https://api.useplunk.com/v1/track', {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer <API_KEY>"
    },
    body: JSON.stringify({
        "event": "new-project",
        "email": "hello@useplunk.com"
    })
});

```

Events will automatically show up in the Plunk dashboard, as well as newly created contacts.

## [​](https://docs.useplunk.com/guides/setting-up-automation\#creating-a-template)  Creating a template

Templates are the blueprints for your emails. They allow you to create a design that you can edit and reuse. Plunk’s template editor makes it easy to create beautiful emails that look great on all devices.

![Plunk email editor](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/editor.png)

## [​](https://docs.useplunk.com/guides/setting-up-automation\#setting-up-an-action)  Setting up an action

Once you have an event and action on hand, you can bring them together in an action. Actions allow you to configure what events trigger which emails. You can also set up delays and conditions to make sure that your emails are sent at the right time.

![Plunk action editor](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/action.png)

[Self-hosting Plunk](https://docs.useplunk.com/getting-started/self-hosting) [Send a transactional email](https://docs.useplunk.com/guides/send-a-transactional-email)

CtrlI

[twitter](https://twitter.com/useplunk) [github](https://github.com/useplunk)

[Powered by Mintlify](https://mintlify.com/?utm_campaign=poweredBy&utm_medium=referral&utm_source=plunk)

Assistant

Responses are generated using AI and may contain mistakes.

![Plunk email editor](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/editor.png)

![Plunk action editor](https://mintlify.s3.us-west-1.amazonaws.com/plunk/images/action.png)