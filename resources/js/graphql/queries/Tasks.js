import gql from "graphql-tag";

export const PAGINATE_TASKS_QUERY = gql`
{
  tasks {
    data {
	    id
	    title
	    description
	    due_date
	    status
	    category {
	    	id
	    	name
	    }
	}
  }
}`