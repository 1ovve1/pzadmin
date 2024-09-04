
export interface PaginationInterface<T>
{
    current_page?: number;
    data: T[]
    first_page_url?: string;
    from?: number;
    last_page?: number;
    last_page_url?: string;
    links: LinkInterface[];
    next_page_url: string|null;
    path?: string;
    per_page?: number;
    pref_page_url: string|null;
    to?: number;
    total?: number;
}
export class Pagination<T> implements PaginationInterface<T> {
    current_page?: number;
    data: T[] = [];
    first_page_url?: string;
    from?: number;
    last_page?: number;
    last_page_url?: string ;
    links: LinkInterface[] = [];
    next_page_url: string | null = null;
    path?: string;
    per_page?: number;
    pref_page_url: string | null = null;
    to?: number;
    total?: number;
}

export interface LinkInterface
{
    url: string|null;
    label: string;
    active: boolean;
}
