```yaml
Company:
    attributes:
        name: string
        website: string
        phone: string
        address: string
        city: string
        state: string
        zip: string
    relationships:
        contacts:
            type: Contact
```

```yaml
Contact:
    attributes:
        company_id: integer
        first_name: string
        last_name: string
        email: string
        phone: string
        title: string
    relationships:
        company:
            type: Company
            foreign_key: company_id
```

```yaml
Deal:
    attributes:
        company_id: integer
        contact_id: integer
        name: string
        deal_stage_id: integer
        expected_close_date: date
        status: string
    relationships:
        company:
            type: Company
            foreign_key: company_id
        contact:
            type: Contact
            foreign_key: contact_id
```

```yaml
Deal Stage:
    attributes:
        name: string
        order: integer
    relationships:
        deals:
            type: Deal
```

```yaml
Activity:
    attributes:
        deal_id: integer
        contact_id: integer
        activity_type: string
        date: date
        notes: string
    relationships:
        deals:
            type: Deal
            foreign_key: deal_id
        contacts:
            type: Contact
            foreign_key: contact_id
```

```yaml
Enums: Prospecting
    Qualification
    Needs Analysis
    Proposal Sent
    Negotiation
    Contract Sent
    Closed Won
    Closed Lost
```
